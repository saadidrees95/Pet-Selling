<?php

namespace App\Http\Controllers\Admin;

use App\Models\SitterReview;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PetOwnerReview;

class AdminReviewController extends Controller
{
    public function ownerIndex()
    {
        // Set page title
        $pageTitle = "Review Management | Petlodger";
        $title = "Owner Review List";

        // Get active ads with related details and paginate the results
        $reviews = PetOwnerReview::
            orderBy('created_at', 'desc')
            ->get();


        // dd($ads->toArray());
        return view('admin.review.petowner', compact('reviews', 'title', 'pageTitle'));
    }
    public function sitterIndex()
    {
        // Set page title
        $pageTitle = "Review Management | Petlodger";
        $title = "Sitter Review List";

        // Get active ads with related details and paginate the results
        $reviews = SitterReview::orderBy('created_at', 'desc')
            ->get();


        // dd($ads->toArray());
        return view('admin.review.sitter', compact('reviews', 'title', 'pageTitle'));
    }
    /**
     * Display a listing of the resource.
     */

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        return view('admin.subscriber.view');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // return $id;
        $ad = Subscriber::findOrFail($id);
        $ad->delete();

        // return $service;
        return redirect()->route('admin.subscriber.lists')->with('success', 'Subscriber deleted successfully');
    }
}
