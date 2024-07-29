<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SitterReview;

class AdminBuyerReviewController extends Controller
{
    // list reviews by PetOwner
    public function index()
    {
        // Set page title
        $pageTitle = "Review Management | Petlodger";
        $title = "Owner Review List";

        // Get active ads with related details and paginate the results
        $reviews = SitterReview::with('user.userImage', 'sitter.user')
            ->orderBy('created_at', 'desc')
            ->paginate(6);

        // dd($reviews->toArray());
        return view('admin.review.pet_owner.index', compact('reviews', 'title', 'pageTitle'));
    }

    // delete reviews by PetOwner
    public function destroy($id)
    {
        // return $id;
        $reviews = SitterReview::findOrFail($id);
        $reviews->delete();

        // return $service;
        return redirect()->route('admin.owner-review.lists')->with('success', 'Review deleted successfully!');
    }
}
