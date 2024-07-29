<?php

namespace App\Http\Controllers\Admin;

use App\Exports\SittersExport;
use App\Models\User;
use App\Models\Address;
use App\Models\PetType;
use App\Models\SitterExperience;
use App\Models\Sitter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Maatwebsite\Excel\Facades\Excel;

class AdminSitterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = "Sitter List | Petlodger";

        $sitters = User::with('sitter', 'address', 'userImage', 'sitter.petType')
            ->where('role_id', 5)
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        return view('admin.sitter.index', compact('sitters', 'pageTitle'));
    }

    public function exportSitters()
{
    return Excel::download(new SittersExport, 'sitters.csv');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pageTitle = "Sitter Details | Petlodger";
        $sitter = User::with('sitter', 'address', 'sitter.petType', 'sitter.experience')->find($id);

        return view('admin.sitter.view', compact('sitter', 'pageTitle'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pageTitle = "Edit Sitter Details| Petlodger";
        $sitter = User::with('sitter', 'address', 'sitter.petType', 'sitter.experience')->find($id);
        $petTypes = PetType::get();
        $sitterExperiences = SitterExperience::get();

        return view('admin.sitter.edit', compact('sitter', 'petTypes', 'sitterExperiences', 'pageTitle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validatedData = $this->validateSitter($request);

        try {
            DB::beginTransaction();
            $user = User::with('address', 'sitter')->findOrFail($validatedData->user_id);

            $user->update([
                'full_name' => $validatedData->full_name,
                'mobile' => $validatedData->mobile,
                // 'insurance_number' => $validatedData->insurance_number,
                'about' => $validatedData->about,
                'active' => $validatedData->active,
            ]);

            $this->updateOrCreateAddress($user, $validatedData);
            $this->updateOrCreateSitter($user, $validatedData);

            DB::commit();

            return redirect()->route('admin.sitter.lists')->with('success', 'Sitter Profile updated successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => 'Failed to update Sitter Profile. Please try again!']);
        }
    }

    /**
     * Validate the request for sitter data.
     */
    protected function validateSitter(Request $request)
    {

        $validatedData = $request->validate([
            'full_name' => 'required|string|max:160',
            'mobile' => 'required|numeric|digits:11',
            // 'insurance_number' => 'required|string|size:9',
            'about' => 'required|string|max:500',
            'active' => 'required',
            'street' => 'required|string|max:255',
            'post_code' => 'required|string|size:6',
            'city' => 'required|string|max:60',
            'sit_type' => 'required|string',
            'experience' => 'required',
            'rate' => 'required',
            'availability' => 'required',
            'species' => 'required',
            // 'title' => 'required|string|max:300', replace with about
            'user_id' => 'required',
        ]);

        return (object)$validatedData;
    }

    /**
     * Update or create the address for the sitter.
     */
    protected function updateOrCreateAddress(User $user, $validatedData)
    {
        $user->address->updateOrCreate([], [
            'street' => $validatedData->street,
            'post_code' => $validatedData->post_code,
            'city' => $validatedData->city,
            'country' => 'United Kingdom',
        ]);
    }

    /**
     * Update or create the sitter details.
     */
    protected function updateOrCreateSitter(User $user, $validatedData)
    {
        $user->sitter->updateOrCreate([], [
            'sit_type' => $validatedData->sit_type,
            'sitter_experience_id' => $validatedData->experience,
            'rate' => $validatedData->rate,
            'availability' => $validatedData->availability,
            'pet_type_id' => $validatedData->species,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // find user and delete
        $sitter = User::findOrFail($id);
        $sitter->delete();

        return redirect()->route('admin.sitter.lists')->with('success', 'Sitter Profile deleted!');
    }
}
