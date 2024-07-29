<?php

namespace App\Http\Controllers\Admin;

use App\Models\Ad;
use Carbon\Carbon;
use App\Models\Pet;
use App\Models\PetAge;
use App\Models\PetSize;
use App\Models\PetType;
use App\Models\Service;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PetMedication;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class AdminAdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Set page title
        $pageTitle = "Ad List | Petlodger";
        $title = "Ad List";

        // Get active ads with related details and paginate the results
        $ads = Ad::with('pets.type', 'pets.age', 'pets.size', 'pets.medication', 'pets.image', 'user.address', 'user.userImage', 'responses', 'service', 'views')
        ->orderBy('created_at', 'desc')
        ->paginate(6);

        return view('admin.ad.index', compact('ads', 'title', 'pageTitle'));
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pageTitle = "Ad Details | Petlodger";
        // Get active ads with related details and paginate the results

        $ad = Ad::with('pets.type', 'pets.age', 'pets.size', 'pets.medication', 'pets.image', 'service', 'user.address', 'user.userImage')
        ->find($id);

        return view('admin.ad.view', compact('ad', 'pageTitle'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pageTitle = "Edit Ad Details | Petlodger";
        $ad = Ad::with('pets.type', 'pets.age', 'pets.size', 'pets.medication', 'pets.image', 'service', 'user.address', 'user.userImage')
        ->find($id);
        
        $petTypes = PetType::get();
        $petAges = PetAge::get();
        $petSizes = PetSize::get();
        $petMedications = PetMedication::get();
        $services = Service::get();


        return view('admin.ad.edit', compact('ad', 'petTypes', 'petAges', 'petSizes', 'petMedications', 'services', 'pageTitle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validatedData = $this->validatePetCareRequest($request);
    
        try {
            DB::beginTransaction();

            // Get Pet & Ad by ID
            $pet = Pet::findOrFail($validatedData->pet_id);
            $ad = Ad::findOrFail($validatedData->ad_id);

            // Create or Update Pet & Update    
            $this->updateOrCreatePet($pet, $validatedData);
            $this->updateOrCreateAd($ad, $validatedData);

            DB::commit();

            return redirect()->route('admin.ad.lists')->with('success', 'Ad updated successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => 'Failed to update Ad Profile. Please try again!']);
        }
    }
    /**
     * Validate the request for sitter data.
     */
    protected function validatePetCareRequest(Request $request)
    {

        $validatedData = $request->validate([

            // hidden ids for get data
            'user_id' => 'required|numeric',
            'pet_id' => 'required|numeric',
            'ad_id' => 'required|numeric',
            // personal info - read only 
            'full_name' => 'required|string|max:160',
            'mobile' => 'required|numeric|digits:11',
            'email' => 'required',
            // pet details
            'name' => 'required|string|max:160',
            'species' => 'required|numeric',
            'breed' => 'required|string:max:160',
            'size' => 'required|numeric',
            'age' => 'required|numeric',
            'medication' => 'required|numeric',
            'behavior' => 'required|string|max:60',
            'about' => 'required|string|max:500',
            // ad details
            'title' => 'required|string|max:300',
            'ref' => 'required|string|max:8',
            'req_date' => 'required|date',
            'duration' => 'required|numeric',
            'service' => 'required|numeric',
            'active' => 'required',
            // address - read only
            'country' => 'required|string|max:60',
            'street' => 'required|string|max:160',
            'city' => 'required|string|max:60',
            'post_code' => 'required|string|max:6',
        ]);

        return (object)$validatedData;
    }

    /**
     * Update or create the pet.
     */
    protected function updateOrCreatePet($pet, $validatedData)
    {
        $pet->updateOrCreate([], [
            'name' => $validatedData->name,
            'breed' => $validatedData->breed,
            'behavior' => $validatedData->behavior,
            'about' => $validatedData->about,
            'pet_type_id' => $validatedData->species,
            'pet_size_id' => $validatedData->size,
            'pet_age_id' => $validatedData->age,
            'pet_medication_id' => $validatedData->medication,
            'user_id' => $validatedData->user_id,
        ]);
    }

    /**
     * Update or create ad.
     */
    protected function updateOrCreateAd($ad, $validatedData)
    {
        $ad->updateOrCreate([], [
            'ref' => $validatedData->ref,
            'title' => $validatedData->title,
            'req_date' => $validatedData->req_date,
            'duration' => $validatedData->duration,
            'active' => $validatedData->active,
            'about' => $validatedData->about,
            'service_id' => $validatedData->service,
            'pet_id' => $validatedData->pet_id,
            'user_id' => $validatedData->user_id,
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ad = Ad::findOrFail($id);
        $ad->delete();

        return redirect()->route('admin.ad.lists')->with('success', 'Ad deleted successfully');
    }


    public function republishAd($adId)
    {
        // Find the ad by ID
        $ad = Ad::findOrFail($adId);

        // Update ad attributes
        $ad->update([
            'ref' => Str::random(8),
            'req_date' => Carbon::now(),
            'active' => true,
        ]);

        // Return a JSON response
        return response()->json(['message' => 'Ad republished successfully']);
    }
    
}
