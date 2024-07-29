<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PetOwnerReview;

class AdminSellerReviewController extends Controller
{
    public function index()
    {
        $pageTitle = "Review Management | Petlodger";
        $title = "Owner Review List";

        // Get active ads with related details and paginate the results
        $reviews = PetOwnerReview::with('sitter.user.userImage', 'user')
        ->orderBy('created_at', 'desc')
        ->paginate(6);


        // dd($reviews->toArray());
        return view('admin.review.sitter.index', compact('reviews', 'title', 'pageTitle'));
    }
 
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // return $id;
        $reviews = PetOwnerReview::findOrFail($id);
        $reviews->delete();

        // return $service;
        return redirect()->route('admin.sitter-review.lists')->with('success', 'Review deleted successfully!');
    }
}
