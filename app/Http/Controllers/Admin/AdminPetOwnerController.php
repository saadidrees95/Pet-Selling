<?php

namespace App\Http\Controllers\Admin;

use App\Exports\PetOwnersExport;
use App\Models\User;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Maatwebsite\Excel\Facades\Excel;

class AdminPetOwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = "Pet Owner List | Petlodger";

        $petOwners = User::with('address', 'userImage', 'pets', 'pets.type', 'pets.age', 'pets.size', 'pets.medication', 'pets.image')
            ->where('role_id', 4)
            ->orderBy('created_at', 'desc')
            ->paginate(8);

        return view('admin.pet_owner.index', compact('petOwners', 'pageTitle'));
    }

    public function exportPetOwners()
{
    return Excel::download(new PetOwnersExport, 'pet-owners.csv');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pageTitle = "Pet Owner Details | Petlodger";
        $petOwner = User::with('address')->findOrFail($id);

        return view('admin.pet_owner.view', compact('petOwner', 'pageTitle'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pageTitle = "Pet Owner Details | Petlodger";
        $petOwner = User::with('address')->findOrFail($id);

        return view('admin.pet_owner.edit', compact('petOwner', 'pageTitle'));
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request): RedirectResponse
    // {
    //     // dd($request->all());
    //     // Validate Form Data
    //     $validatedData = $this->validatePetOwner($request);

    //     try {
    //         DB::beginTransaction();

    //         $user = User::with('address')->findOrFail($validatedData->user_id);
    //         $address = $user->address;

    //         // Update User information
    //         $user->update([
    //             'full_name' => $validatedData->full_name,
    //             'mobile' => $validatedData->mobile,
    //             'insurance_number' => $validatedData->insurance_number,
    //             'about' => $validatedData->about,
    //             'active' => $validatedData->active,
    //         ]);


    //         // Check if the user has an associated address
    //         if ($address) {
    //             // Update or create address
    //             $address->update([
    //                 'street' => $validatedData->street,
    //                 'post_code' => $validatedData->post_code,
    //                 'city' => $validatedData->city,
    //                 'country' => 'United Kingdom',
    //             ]);
    //         }

    //         // Check if the user has an associated address
    //         if (!$address) {
    //             if($request->street !== null){
    //                 dd($request->street);
    //                 Address::create([
    //                     'street' => $validatedData->street,
    //                     'post_code' => $validatedData->post_code,
    //                     'city' => $validatedData->city,
    //                     'country' => 'United Kingdom',
    //                     'user_id' => $user->id,
    //                 ]);

    //             }

    //         }

    //         DB::commit();

    //         return redirect()->route('admin.pet-owner.lists')->with('success', 'Pet Owner Profile updated successfully!');
    //     } catch (\Exception $e) {
    //         DB::rollBack();
    //         return redirect()->back()->with('error' , 'Failed to update Pet Owner Profile. Please try again!');
    //     }
    // }


    public function update(Request $request): RedirectResponse
    {
        // Validate Form Data
        $validatedData = $this->validatePetOwner($request);

        try {
            DB::beginTransaction();

            $user = User::with('address')->findOrFail($validatedData->user_id);
            $address = $user->address;

            // Update User information
            $user->update([
                'full_name' => $request->full_name,
                'mobile' => $request->mobile,
                'insurance_number' => $request->insurance_number,
                'about' => $request->about,
                'active' => $request->active,
            ]);

            // Check if the user has an associated address
            if ($address) {
                // Update existing address
                $address->update([
                    'street' => $request->street,
                    'post_code' => $request->post_code,
                    'city' => $request->city,
                    'country' => 'United Kingdom',
                ]);
                // Check if the user has no associated address
            } else {
                // Create a new address if it doesn't exist and street is not null
                if ($request->street && $request->post_code && $request->city) {
                    Address::create([
                        'street' => $request->street,
                        'post_code' => $request->post_code,
                        'city' => $request->city,
                        'country' => 'United Kingdom',
                        'user_id' => $user->id,
                    ]);
                }
            }

            DB::commit();

            return redirect()->route('admin.pet-owner.lists')->with('success', 'Pet Owner Profile updated successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to update Pet Owner Profile. Please try again!');
        }
    }


    /**
     * Validate the request.
     */
    protected function validatePetOwner(Request $request)
    {
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:160',
            'mobile' => 'required|numeric|digits:11',
            'insurance_number' => 'nullable|string|size:9',
            'about' => 'nullable|string|max:500',
            'active' => 'required',
            'street' => 'nullable|string|max:255',
            'post_code' => 'nullable|string|size:6',
            'city' => 'nullable|string|max:60',
            'user_id' => 'required',
        ]);
        return $validatedData = (object)$validatedData;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $petOwner = User::findOrFail($id);
        $petOwner->delete();

        return redirect()->route('admin.pet_owner.index')->with('success', 'Pet Owner profile deleted!');
    }
}
