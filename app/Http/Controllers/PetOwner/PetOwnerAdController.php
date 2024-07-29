<?php

namespace App\Http\Controllers\PetOwner;

use App\Models\Ad;
use App\Models\Pet;
use App\Models\User;
use App\Models\PetAge;
use App\Models\Address;
use App\Models\PetSize;
use App\Models\PetType;
use App\Models\Service;
use App\Models\PetImage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PetMedication;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PetOwnerAdController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Set page title
        $pageTitle = "Post an Ad";

        // Get logged-in user's id
        $userId = Auth::id();

        // Get user details
        $user = User::with('address', 'userImage')->find($userId);

        // Get pet types, sizes, ages, medications, and services from the database
        $pet_types = PetType::get();
        $pet_sizes = PetSize::get();
        $pet_ages = PetAge::get();
        $pet_medications = PetMedication::get();
        $services = Service::get();

        // dd($pet_types->toArray());

        // Pass necessary data to the view
        return view('web.pet-owner.ads.add', compact('user', 'pet_types', 'pet_sizes', 'pet_ages', 'pet_medications', 'services', 'pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate the request data
        $this->validatePetCareRequest($request);

        // Create a new pet entry in the database
        $pet = Pet::create([
            'number' => $request->number,
            'breed' => $request->breed,
            'behavior' => $request->behavior,
            'about' => $request->about,
            'pet_type_id' => $request->species,
            'pet_size_id' => $request->pet_size,
            'pet_age_id' => $request->pet_age,
            'pet_medication_id' => $request->medication,
            'user_id' => Auth::id(),
        ]);

        // Create a new ad entry in the database
        $ad = Ad::create([
            'ref' => Str::random(8),
            'title' => $request->title,
            'req_date' => $request->date,
            'duration' => $request->duration,
            'active' => true,
            'about' => $request->about,
            'service_id' => $request->service,
            'pet_id' => $pet->id,
            'user_id' => Auth::id(),
        ]);

        // Handle Image Upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image_path = $image->storeAs('images', $image_name, 'public');

            // Create Image Record for the pet
                PetImage::create([
                    'image_type' => 'profile_image',
                    'title' => $image_name,
                    'image_path' => $image_path,
                    'pet_id' => $pet->id,
                ]);
        }


        // Redirect to the user's profile page with a success message
        return redirect()->route('profile')->with('success', 'Ad has been Posted Successfully!');
    }

    /**
     * Validate the pet care request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    private function validatePetCareRequest(Request $request)
    {
        $request->validate([
            'number' => 'required',
            'breed' => 'required|string|max:30',
            'behavior' => 'required|string|max:60',
            'about' => 'required|string|max:500',
            'species' => 'required|numeric',
            'pet_size' => 'required|numeric',
            'pet_age' => 'required|numeric',
            'medication' => 'required|numeric',
            'title' => 'required|string:max:160',
            'date' => 'required|date',
            'duration' => 'required|numeric|max:60',
            'about' => 'required|string|max:500',
            'service' => 'required|numeric',
            'street' => 'required|string|max:120',
            'post_code' => 'required|string|min:6|max:6',
            'city' => 'required|string|max:30',
            'image' =>'required|image|mimes:jpeg,png,jpg|max:50000', // Validate image upload (50MB)
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\View\View
     */
    public function show(string $id)
    {
        // Fetch ad listing data by ID from the database
        $ad = Ad::with('pets.type', 'pets.age', 'pets.size', 'pets.medication', 'pets.image', 'service', 'user.address', 'user.userImage')
        ->find($id);

        // Get the currently authenticated user
        $user = Auth::user();

        // Pass the ad listing data to the view
        return view('web.pet-owner.ads.view', compact('user', 'ad'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        // Set page title
        $pageTitle = "Edit an Ad";

        // Get logged-in user's id
        $userId = Auth::id();

        // // Get user details
        // $user = User::with('address', 'userImage')->find($userId);

        // $pageTitle = "Edit Ad Details | Petlodger";
        $ad = Ad::with( 'pets', 'pets.type', 'pets.age', 'pets.size', 'pets.medication', 'pets.image', 'service', 'user.address', 'user.userImage')
        ->find($id);

        // Get pet types, sizes, ages, medications, and services from the database
        $pet_types = PetType::get();
        $pet_sizes = PetSize::get();
        $pet_ages = PetAge::get();
        $pet_medications = PetMedication::get();
        $services = Service::get();

        // dd($ad->toArray());

        // Pass necessary data to the view
        return view('web.pet-owner.ads.edit', compact('ad',  'pet_types', 'pet_sizes', 'pet_ages', 'pet_medications', 'services', 'pageTitle'));

    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // dd($request->all());
        $validatedData = $this->validatePetCareUpdateRequest($request);

        try {

            DB::beginTransaction();

            // Get Pet & Ad by ID
            $pet = Pet::with('image')->findOrFail($validatedData->pet_id);
            $ad = Ad::findOrFail($validatedData->ad_id);
            $user = User::findOrFail(Auth::id());
            // dd($pet, $ad, $user, 'line 267');

            // Create or Update Pet & Update
            $this->updatePet($pet, $validatedData);
            // dd('line 261');
            $this->updateAd($ad, $validatedData);
            // dd('line 263');
            $this->updateAddress($user, $validatedData);
            // dd('line 265');

            // Handle Image Upload
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $image_name = time() . '.' . $image->getClientOriginalExtension();
                $image_path = $image->storeAs('images', $image_name, 'public');

                // Create Image Record for the pet
                PetImage::create([
                    'image_type' => 'profile_image',
                    'title' => $image_name,
                    'image_path' => $image_path,
                    'pet_id' => $pet->id,
                ]);
            }
            // Handle Image Upload
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $image_name = time() . '.' . $image->getClientOriginalExtension();
                $image_path = $image->storeAs('images', $image_name, 'public');

                // Update or create UserImage record

                if ($pet->image) {
                    $pet->image->update([
                        'title' => $image_name,
                        'image_path' => $image_path,
                    ]);
                } else {
                    PetImage::create([
                        'image_type' => 'profile_image',
                        'title' => $image_name,
                        'image_path' => $image_path,
                        'pet_id' => $pet->id,
                    ]);
                }
            }

            DB::commit();

            return redirect()->route('profile')->with('success', 'Ad updated successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            // dd('stop');
            return redirect()->back()->withErrors(['error' => 'Failed to update Ad. Please try again!']);
        }
    }

    /**
     * Update or create the pet.
     */
    protected function updatePet($pet, $validatedData)
    {

        $pet->update([
            'name' => $validatedData->pet_name,
            'breed' => $validatedData->breed,
            'behavior' => $validatedData->behavior,
            'about' => $validatedData->about,
            'pet_type_id' => $validatedData->species,
            'pet_size_id' => $validatedData->pet_size,
            'pet_age_id' => $validatedData->pet_age,
            'pet_medication_id' => $validatedData->medication,
            'user_id' => Auth::id(),
        ]);

    }

    /**
     * Update or create ad.
     */
    protected function updateAd($ad, $validatedData)
    {
        $ad->update([
            'title' => $validatedData->title,
            'req_date' => $validatedData->date,
            'duration' => $validatedData->duration,
            'about' => $validatedData->about,
            'service_id' => $validatedData->service,
            'pet_id' => $validatedData->pet_id,
        ]);

    }
    protected function updateAddress($user, $validatedData)
    {
        $user->address->update([
            'street' => $validatedData->street,
            'post_code' => $validatedData->post_code,
            'city' => $validatedData->city,
            'pet_id' => $validatedData->pet_id,
            'user_id' => Auth::id(),
        ]);
    }

    /**
     * Validate the request for sitter data.
     */
    protected function validatePetCareUpdateRequest(Request $request)
    {

        $validatedData = $request->validate([

            // hidden ids for get data
            'ad_id' => 'required|numeric',
            'pet_id' => 'required|numeric',
            // pet details
            'pet_name' => 'required|string|max:160',
            'species' => 'required|numeric',
            'breed' => 'required|string:max:160',
            'pet_size' => 'required|numeric',
            'pet_age' => 'required|numeric',
            'medication' => 'required|numeric',
            'behavior' => 'required|string|max:60',
            'about' => 'required|string|max:500',
            // ad details
            'title' => 'required|string|max:300',
            'date' => 'required|date',
            'duration' => 'required|numeric',
            'service' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:50000', // Validate image upload (50MB)
            // address - read only
            // 'country' => 'required|string|max:60',
            'street' => 'required|string|max:160',
            'city' => 'required|string|max:60',
            'post_code' => 'required|string|max:6',
        ]);

        // dd($validatedData);
        return (object)$validatedData;
    }


}