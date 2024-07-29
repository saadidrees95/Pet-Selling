<?php

namespace App\Http\Controllers\PetOwner;

use App\Models\User;
use App\Models\Sitter;
use App\Models\Address;
use App\Models\UserImage;
use App\Models\SitterReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PetOwnerAboutController extends Controller
{
    /**
     * Display the sitter's profile page with reviews and comments.
     *
     * @param  int  $id  The id of the sitter.
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        // Page title and description
        $pageTitle = "Sitter Profile";

        // Get the authenticated user (pet-owner)
        $user = User::find(Auth::id());

        // Get the sitter's information
        $sitter = Sitter::with('user.address', 'user.userImage')
            ->find($id);

        // Get sitter's reviews from pet owners
        $sitterReviews = SitterReview::with('user.address', 'user.userImage')
            ->orderBy('created_at', 'desc')
            ->where('sitter_id', $sitter->id)
            // ->get();
            ->paginate(5);

        // Return the view with the data
        return view('web.sitter.about.view', compact('user', 'sitter', 'sitterReviews', 'pageTitle'));
    }


}
