<?php

namespace App\Http\Controllers\Sitter;

use App\Models\AdResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PetOwnerReview;

class SitterReviewController extends Controller
{
    /**
     * Store a new review for the sitter.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Step 1: Validate User Input (including the image)
        $this->validateCommentRequest($request);

        // Step 2: Retrieve the latest response for the sitter
        $response = AdResponse::where('sitter_id', $request->sitter_id)
            ->orderBy('created_at', 'desc') // Order the responses by the creation date in descending order
            ->pluck('ad_id') // Pluck the 'ad_id' column from the results
            ->first(); // Retrieve the first item from the results

        // Step 3: Create a new review record for the sitter
        $review = PetOwnerReview::create([
            'rating' => $request->rating,
            'comment' => $request->comment,
            'user_id' => $request->user_id,
            'sitter_id' => $request->sitter_id,
            'ad_id' => $response, // Assign the retrieved ad_id to the review
        ]);

        // Step 4: Handle the review creation result
        if ($review) {
            // Redirect to a specific page after successful review posting
            return redirect()->route('pet-owner.about.show', $request->user_id)->with('success', 'Comment posted successfully!');
        } else {
            // Handle review creation failure
            return redirect()->back()->with('error', 'Failed to post the comment. Please try again.');
        }
    }

    /**
     * Validate the request parameters for posting a comment.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    private function validateCommentRequest(Request $request)
    {
        $request->validate([
            'sitter_id' => 'required|numeric',
            'user_id' => 'required|numeric',
            'full_name' => 'required|string|max:120',
            'email' => 'required|email|max:100',
            // 'mobile' => 'required|regex:/^[0-9]{11}$/',
            'mobile' => 'required|digits:11',
            'comment' => 'required|string|max:500',
            'rating' => 'required|numeric',
        ]);
    }
}
