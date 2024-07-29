<?php

namespace App\Http\Controllers\Sitter;

use App\Models\User;
use App\Models\Credit;
use App\Models\Sitter;
use App\Models\Address;
use App\Models\PetType;
use App\Models\UserImage;
use Illuminate\Http\Request;
use App\Models\SitterExperience;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SitterProfileController extends Controller
{

    /**
     * Load dashboard with (profile, my-ads, picked-ads).
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Set page title
        $pageTitle = "Sitter Profile";

        // Get logged-in user's id
        $userId = Auth::id();

        // Get user details including sitter, address, and userImage relationships
        $user = User::with('sitter.experience', 'sitter.petType',  'address', 'userImage')->find($userId);
        // dd(explode(',',$user->sitter->pet_type_id));
        $pet_types = PetType::whereIn('id',explode(',',$user->sitter->pet_type_id))->get();
        // dd($pet_types);
        // Retrieve order history for the user
        $order = User::with('orders.package')->find($userId);

        $credits = Credit::where('user_id', Auth::id())->get();
        $firstCredit = $credits->first(); // Get the first item in the collection
        $creditBalance = $firstCredit ? $firstCredit->balance : null;
        // dd($creditBalance);

        // Get details of ads associated with the sitter
        $jobs = User::with('sitter.responses.ads.pets', 'sitter.responses.ads.pets.type', 'sitter.responses.ads.pets.size', 'sitter.responses.ads.pets.age', 'sitter.responses.ads.pets.image', 'sitter.responses.ads.pets.medication', 'address', 'ads.user')
            ->find($userId);

        // Return the dashboard view with sitter profile, order history, and ad details
        return view('web.sitter.profile.view', compact('pageTitle', 'user', 'jobs', 'order', 'creditBalance','pet_types'));
    }

    /**
     * Display the form for editing the sitter's profile.

     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        // Set page title
        $pageTitle = "Sitter Profile Edit";

        // Get logged-in user's id
        $userId = Auth::id();

        // Retrieve pet species and sitter experiences for dropdown options
        $pet_type = PetType::get();
        $sitter_experiences = SitterExperience::get();

        // Get user details including sitter, address, and userImage relationships
        $user = User::with('sitter', 'address', 'userImage')->find($userId);

        // Return the edit profile form with user data and dropdown options for species and experiences
        return view('web.sitter.profile.edit', compact('pageTitle', 'user', 'pet_type', 'sitter_experiences'));
    }

    /**
     * Handle the form submission for updating the sitter's profile.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        // dd($request->all());
        // Validate form inputs
        $request->validate([
            'full_name' => 'required|string|max:255',
            'mobile' => 'required|digits:11',
            'insurance_number' => 'nullable|string|min:9|max:9',
            'street' => 'required|string|max:255',
            // 'post_code' => 'required|digits:6',
            'post_code' => 'required|min:6|max:6',
            'city' => 'required|string|max:60',
            'about' => 'string|max:500',
            'notes' => 'string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:50000', // Validate image upload (50MB)
            'species' => 'required',
            'experience' => 'required',
            'other_species' => 'required',
            'sit_type' => 'required',
            'availability' => 'required',
        ]);

        try {
            // Begin a database transaction
            DB::beginTransaction();

            // Retrieve the existing user, address, and userImage records based on the user's ID
            $user = User::with('address', 'userImage', 'sitter')->findOrFail(Auth::id());
            $address = $user->address;
            $sitter = $user->sitter;
            $userImage = $user->userImage;

            if ($user) {
                // Update User information
                $user->update([
                    'full_name' => $request->full_name,
                    'mobile' => $request->mobile,
                    'insurance_number' => $request->insurance_number ?? null,
                    'about' => $request->about ?? null,
                    'notes' => $request->notes ?? null,
                ]);
                //user has data because of registration so don't need for else condition
            }

            if ($address) {
                // Update Address details
                $user->address->update([
                    'street' => $request->street,
                    'post_code' => $request->post_code,
                    'city' => $request->city,
                    'country' => 'United Kingdom',
                ]);
            } else {
                // Create Address
                $address = Address::create([
                    'street' => $request->street,
                    'post_code' => $request->post_code,
                    'city' => $request->city,
                    'country' => 'United Kingdom',
                    'user_id' => $user->id, // Assign user_id foreign key
                ]);
            }

            if ($sitter) {
                // Update Address details
                $user->sitter->update([
                    'sit_type' => $request->sit_type,
                    'other_species' => $request->other_species,
                    'availability' => $request->availability,
                    'sitter_experience_id' => $request->experience,
                    'pet_type_id' => $request->species,
                ]);
            } else {
                // Create Address
                $sitter = Sitter::create([
                    'sit_type' => $request->sit_type,
                    'other_species' => $request->other_species,
                    'availability' => 1,
                    'charging_mode' => 'Hourly',
                    'sitter_experience_id' => $request->experience,
                    'pet_type_id' => $request->species,
                    'user_id' => Auth::id(),
                ]);
            }

            // Handle Profile Pic Upload
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $image_name = time() . '.' . $image->getClientOriginalExtension();
                // $image_path = $image->storeAs('images', $image_name, 'public');
                $image->move(public_path('storage/images/'), $image_name);

                // Update or create UserImage record
                if ($userImage) {
                    $userImage->update([
                        'title' => $image_name,
                        'image_path' => 'images/'.$image_name,
                    ]);
                } else {
                    UserImage::create([
                        'user_id' => $user->id,
                        'image_type' => 'profile_image',
                        'title' => $image_name,
                        'image_path' => 'images/'.$image_name,
                    ]);
                }
            }

            // Commit the transaction
            DB::commit();

            // Redirect to the home page with a success message
            return redirect()->route('sitter.profile')->with('success', 'Profile updated successfully');
        } catch (\Exception $e) {
            // Rollback the transaction in case of an error
            DB::rollBack();

            // Redirect back to the edit profile page with an error message
            return redirect()->back()->withErrors(['error' => 'Failed to update profile. Please try again.']);
        }
    }

    public function delete(User $user){
        // dd($user);
        $sitter = Sitter::where('user_id',$user->id)->first();
        $sitter->delete();
        $user->delete();
        Auth::logout();
        return redirect('/');
        // dd($user);
    }
}
