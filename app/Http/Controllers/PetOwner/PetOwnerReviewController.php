<?php

namespace App\Http\Controllers\PetOwner;

use App\Models\AdResponse;
use App\Models\SitterReview;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class PetOwnerReviewController extends Controller
{
    public function store(Request $request)
    {
        // return $request->all();
        // Step 1: Validate User Input (including the image)
        $this->validateCommentRequest($request);

        $responses = AdResponse::where('sitter_id', $request->sitter_id)
        ->orderBy('created_at', 'desc') // Order the responses by the creation date in descending order
            ->pluck('ad_id') // Pluck the 'ad_id' column from the results
            ->first(); // Retrieve the first item from the results

        // dd($responses);
        
        $reviews = SitterReview::create([

            'user_id' => $request->user_id,
            'sitter_id' => $request->sitter_id,
            'rating' => $request->rating,
            'comment' => $request->comment,
            'ad_id' => $responses,
        
        ]);


        if ($reviews) {
            // Redirect to a specific page after successful ads posting
            return redirect()->route('sitter.about.show', $request->sitter_id)->with('success', 'Comment Posting Successfully!');
        } else {
            // Handle ads listing creation failure
            return redirect()->back()->withErrors(['error' => 'Failed to post the comment. Please try again.']);
        }
    }
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
