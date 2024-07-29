<?php

namespace App\Http\Controllers\Sitter;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\PetOwnerReview;
use Illuminate\Support\Facades\Auth;

class SitterAboutController extends Controller
{

    /**
     * Display the profile page for a pet owner.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        // Set page title
        $pageTitle = "PetOwner Profile";

        // Fetch pet owner details by their ID
        $pet_owner = User::with('address', 'userImage')->find($id);

        // Get currently authenticated user (sitter)
        $userId = Auth::id();
        $sitter = User::with('address', 'userImage')->find($userId);

        $petOwnerRating = PetOwnerReview::where('user_id', $id)->avg('rating');
        $averageRating = number_format($petOwnerRating, 1);

        $totalRating = PetOwnerReview::where('user_id', $id)->count('rating');
        $ratingFive = PetOwnerReview::where('user_id', $id)->where('rating',5)->count('rating');
        $ratingFour = PetOwnerReview::where('user_id', $id)->where('rating',4)->count('rating');
        $ratingThree = PetOwnerReview::where('user_id', $id)->where('rating',3)->count('rating');
        $ratingTwo = PetOwnerReview::where('user_id', $id)->where('rating',2)->count('rating');
        $ratingOne = PetOwnerReview::where('user_id', $id)->where('rating',1)->count('rating');
        // dd($totalRating);

        // Get reviews given by pet owner to the sitter
        $petOwnerReviews = PetOwnerReview::with('sitter.user.userImage')
            ->orderBy('created_at', 'desc')
            ->where('user_id', $pet_owner->id)
            // ->get();
            ->paginate(5);


        // Pass the data to the view
        return view('web.pet-owner.about.view', compact('sitter', 'pet_owner', 'petOwnerReviews', 'pageTitle','averageRating','ratingFive','totalRating','ratingFour','ratingThree','ratingTwo','ratingOne'));
    }
}
