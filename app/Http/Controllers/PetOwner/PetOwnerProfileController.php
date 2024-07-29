<?php

namespace App\Http\Controllers\PetOwner;

use App\Models\User;
use App\Models\Address;
use App\Models\UserFile;
use App\Models\UserImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PetOwnerProfileController extends Controller
{
    /**
     * Display the pet owner's profile dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Set page title
        $pageTitle = "Pet Owner Profile";

        // Get logged-in user's id
        $userId = Auth::id();

        // Get user details including address and userImage
        $user = User::with('address', 'userImage')->find($userId);

        // Get pets details for profile page including type, age, size, medication, and images
        $pets = User::with('address', 'userImage', 'pets.type', 'pets.age', 'pets.size', 'pets.medication', 'pets.image')->find($userId);

        // Get user's ads details including pets, type, service, views, and sitter responses
        $ads = User::with('ads.pets.image', 'ads.pets.type', 'ads.service', 'ads.views', 'ads.responses.sitter')
            ->orderBy('created_at', 'desc')  // Then sort by creation date in descending order
            // ->orderBy('active', 'desc')  // Sort by active status (active records first)
            ->find($userId);


        // Get user's responses details including ads, pets' images, type, size, age, and sitters
        $responses = User::with('responses.ads', 'responses.ads.pets.image', 'responses.ads.pets.type', 'responses.ads.pets.size', 'responses.ads.pets.age', 'responses.sitter.user.userImage', 'responses.sitter.user.address')
            ->find($userId);

        // Return the data to the view
        return view('web.pet-owner.profile.view', compact('pageTitle', 'user', 'pets', 'ads', 'responses'));
    }

    /**
     * Show the form for editing the pet owner's profile.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        // Set page title
        $pageTitle = "Pet Owner Profile Edit";

        // Get logged-in user's id
        $userId = Auth::id();

        // Get user details including address and userImage
        $user = User::with('address', 'userImage', 'userFile')->find($userId);

        // Return the edit profile form view
        return view('web.pet-owner.profile.edit', compact('pageTitle', 'user'));
    }

    /**
     * Update the pet owner's profile information.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    function update(Request $request)
    {

        // Validate form inputs
        $request->validate([
            'full_name' => 'required|string|max:255',
            'mobile' => 'required|digits:11',
            'insurance_number' => 'nullable|string|min:9|max:9',
            'street' => 'required|string|max:255',
            // 'post_code' => 'digits:6',
            'city' => 'required|string|max:60',
            // 'about' => 'string|max:500',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:50000', // Validate image upload (50MB)


        ]);

        try {

            // dd($request->all());
            // Begin a database transaction
            DB::beginTransaction();

            // Retrieve the existing user, address, and userImage records based on the user's ID
            $user = User::with('address', 'userImage')->findOrFail(Auth::id());
            $address = $user->address;
            $userImage = $user->userImage;

            if ($user) {
                // Update User information
                $user->update([
                    'full_name' => $request->full_name,
                    'mobile' => $request->mobile,
                    'insurance_number' => $request->insurance_number ?? null,
                    'about' => $request->about ?? null,
                ]);
                 //user has data because of registration so don't need for else condition
            }

            if($address){
                // Update Address details
                $user->address->update([
                    'street' => $request->street,
                    'post_code' => $request->post_code,
                    'city' => $request->city,
                    'country' => 'United Kingdom',
                ]);
            }else{
                // Create Address
                $address = Address::create([
                    'street' => $request->street,
                    'post_code' => $request->post_code,
                    'city' => $request->city,
                    'country' => 'United Kingdom',
                    'user_id' => $user->id, // Assign user_id foreign key
                ]);

            }

            // Handle Image Upload
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $image_name = time() . '.' . $image->getClientOriginalExtension();
                $image_path = $image->storeAs('images', $image_name, 'public');

                // Update or create UserImage record
                if ($userImage) {
                    $userImage->update([
                        'title' => $image_name,
                        'image_path' => $image_path,
                    ]);
                } else {
                    UserImage::create([
                        'user_id' => $user->id,
                        'image_type' => 'profile_image',
                        'title' => $image_name,
                        'image_path' => $image_path,
                    ]);
                }
            }

            // Commit the transaction
            DB::commit();

            // Redirect with success message after updating profile
            return redirect()->route('profile')->with('success', 'Profile updated successfully');

        } catch (\Exception $e) {
            // Rollback the transaction in case of an error
            DB::rollBack();
            // Redirect back to the edit profile page with an error message
            return redirect()->back()->withErrors(['error' => 'Failed to update profile. Please try again.'])->withInput();
        }
    }

    public function upload(Request $request)
    {
        // Validate form inputs
        $request->validate([
            'document' =>'required|image|mimes:jpeg,png,jpg|max:50000', // Validate image upload (50MB)
        ]);

        // Retrieve the existing user, address, and userImage records based on the user's ID
        $user = User::with('userFile')->findOrFail(Auth::id());
        $userFile = $user->userFile;
        // dd($userFile);

        // Handle Profile Pic Upload
        if ($request->hasFile('document')) {
            $pet_owner_document = $request->file('document');
            $document_name = time() . '.' . $pet_owner_document->getClientOriginalExtension();
            $document_path = $pet_owner_document->storeAs('images', $document_name, 'public');

            // Update or create UserImage record
            if ($userFile) {
                $userFile->update([
                    'title' => $document_name,
                    'image_path' => $document_path,
                ]);
                // dd('file uploaded');
            } else {
                UserFile::create([
                    'user_id' => $user->id,
                    'image_type' => 'petowner_files',
                    'title' => $document_name,
                    'image_path' => $document_path,
                ]);
                // dd('new file created');
            }

            // Redirect with success message after updating profile
            return redirect()->route('profile')->with('success', 'File uploaded successfully');
        }

        // Redirect back to the edit profile page with an error message
        return redirect()->back()->with('error', 'File not uploaded. Please try again.');

    }

    public function delete(User $user){
        // dd($user);
        $petOwner = User::where('id',$user->id)->first();
        $petOwner->delete();
        Auth::logout();
        return redirect('/');
        // dd($user);
    }
}
