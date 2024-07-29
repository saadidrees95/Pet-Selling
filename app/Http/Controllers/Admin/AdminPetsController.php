<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminPetsController extends Controller
{
    public function index()
    {
        // Set page title
        $pageTitle = "Pet List | Petlodger";

        // Get active ads with related details and paginate the results
        // Get pets details for profile page including type, age, size, medication, and images
        $pets = Pet::with('type', 'age', 'size', 'medication', 'image', 'user')
            ->orderBy('created_at', 'desc')
            // ->get();
            ->paginate(8);

        // dd($pets->toArray());
        return view('admin.pet.index', compact('pets', 'pageTitle'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // return $id;
        $pet = Pet::findOrFail($id);
        $pet->delete();

        // dd($pet_owners->toArray());
        return redirect()->route('admin.pet.lists')->with('success', 'Pet deleted successfully!');
    }

}
