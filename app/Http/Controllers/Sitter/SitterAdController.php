<?php

namespace App\Http\Controllers\Sitter;

use App\Models\Ad;
use App\Models\User;
use App\Models\Sitter;
use App\Models\AdResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UsedCredit;
use Illuminate\Support\Facades\Auth;

class SitterAdController extends Controller
{
    /**
     * Handle the application's ad application process.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function apply(Request $request)
    {
        // Step 1: Validate the request data    
        $request->validate([

            'ad_id' => 'required|exists:ads,id',
            // 'ref' => 'required',

        ]);

        // Step 2: Fetch necessary records from the database

        // Get Ad id from $request
        $adId = $request->ad_id;
        // $adReference = $request->ref;

        // Get Authenticated User
        $user = Auth::user();

        // Get Sitter Details
        $sitter = Sitter::where('user_id', $user->id)->first();

        // Collect Ads
        $ad = Ad::find($adId);

        // Collect Responses
        $responses = AdResponse::where('ad_id', $ad->id)->get();
        // dd($responses);
        // Step 3: Check if the sitter can apply for the ad
        if (!$this->isActive($ad)) {
            return redirect()->route('ad.lists')->with('error', 'Sorry! The Ad has been expired or has been inactive.');
        }

        if ($this->userHasResponded($responses, $sitter, $ad)) {
            // dd('user has already responded');
            return redirect()->route('my-job.show', ['id' => $ad->id])->with('error', 'Sorry! You have already responded to this ad.');
        }
        // dd('user has not responded');
        if (!$this->userHasCredits($user)) {
            // dd(!$this->userHasCredits($user));
            return redirect()->back()->with('error', 'Sorry! You have no sufficient credits.');
        }
        // dd(!$this->userHasCredits($user));
        // Step 4: Perform necessary database operations
        $userCharged = $this->chargeUser($user, $ad);

        if ($userCharged) {
            $markSitter = $this->markSitterResponse($sitter, $user, $ad);
        }

        if ($markSitter) {
            $updateAdStatus = $this->updateAdStatus($ad, $responses);
        }

        // Redirect to the ads applied page with visible contact details
        return redirect()->route('my-job.show', ['id' => $ad->id])->with('success', 'Congratulation! You have successfully applied for this Job.');
    }

    /**
     * Display the specified ad.
     *
     * @param  string  $id
     * @return \Illuminate\View\View
     */
    public function show(string $id)
    {
        $ad = Ad::with('pets.type', 'pets.age', 'pets.size', 'pets.medication', 'pets.image', 'user.address', 'user.userImage')
            ->find($id);

        return view('web.sitter.ad.view', compact('ad'));
    }

    /**
     * Check if the ad is active.
     *
     * @param  \App\Models\Ad  $ad
     * @return bool
     */
    private function isActive($ad)
    {
        return $ad && $ad->active;
    }

    /**
     * Check if the user (sitter) has already responded to the ad.
     *
     * @param  \Illuminate\Database\Eloquent\Collection  $responses
     * @param  \App\Models\Sitter $sitter
     * @return bool
     */

    /*
    //code only for checking: code without any builtin or helper  function for check logic very clearly
    private function userHasResponded($responses, $sitter, $ad)
    {
        if($responses->where('ref', $ad->ref)->count() == 0){
            return false; // nobody has responded to this ad yet
        }elseif($responses->where('ref', $ad->ref)->count() > 0){
            if($responses->where('ref', $ad->ref)->where('sitter_id', $sitter->id)->count() == 0){
                return false;
            }elseif($responses->where('ref', $ad->ref)->where('sitter_id', $sitter->id)->count() == 1){
                return true;
            }else{
                echo "sitter has responded many times";
                dd('stop);
            }
        }
    }
    // after successful creation of logic we optimized the code for production
    */

    private function userHasResponded($responses, $sitter, $ad)
    {
        // Count total responses against ref #.
        $totalResponses = $responses->where('ref', $ad->ref)->count();
        // dd($totalResponses); // it will return only count no.
        // dd($responses); // it will return complete record against each count

        // if ad has no response
        if ($totalResponses == 0) {
            return false; // Nobody has responded to this ad yet
        }

        // if ad has response, then count against this sitter_id
        $sitterResponses = $responses->where('ref', $ad->ref)->where('sitter_id', $sitter->id)->count();

        /*check condition and return: if sitterResponse is equal to one
        so its return true and if equal to 0 the its return false*/
        return $sitterResponses == 1;
    }

     /**
     * Check if the user (sitter) has sufficient credits.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    // private function userHasCredits($user)
    // {
    //     $requiredCredits = 10; // The cost per ad application
    //     $userCredits = User::with('credits')->find($user->id)->credits->balance;
    //     return $userCredits >= $requiredCredits;
    // }
    private function userHasCredits($user)
    {
        $requiredCredits = 3; // The cost per ad application

        // Check if the user has associated credits
        $userWithCredits = User::with('credits')->find($user->id);

        if ($userWithCredits && $userWithCredits->credits) {
            $userCredits = $userWithCredits->credits->balance;

            // dd($userCredits);
            return $userCredits >= $requiredCredits;
        }

        // dd('user has no credit');
        return false; // User has no associated credits
    }

    /**
     * Charge the user (sitter) credits for ad application.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    private function chargeUser($user, $ad)
    {
        $requiredCredits = 3; // The cost per ad application
        // less amount from credit table
        User::find($user->id)->credits->decrement('balance', $requiredCredits);

        // save transaction record
        $userResponseToken = md5($user->id . $ad->id);
        UsedCredit::create([
            'token' => $userResponseToken,
            'credit' => $requiredCredits,
            'user_id' => $user->id,
            'ad_id' => $ad->id,
        ]);

        return true;
    }

    /**
     * Mark the sitter's response to the ad.
     *
     * @param  \App\Models\Sitter  $sitter
     * @param  \App\Models\User  $user
     * @param  \App\Models\Ad  $ad
     * @return bool
     */
    private function markSitterResponse($sitter, $user, $ad)
    {
        $userResponseToken = md5($user->id . $ad->id);

        $adresp = AdResponse::create([
            'ref' => $ad->ref,
            'responses_count' => 1,
            'token' => $userResponseToken,
            'sitter_id' => $sitter->id,
            'user_id' => $ad->user_id,
            'ad_id' => $ad->id,
        ]);
        // dd($adresp);
        return true;
    }

    /**
     * Update the ad status based on the responses count.
     *
     * @param  \App\Models\Ad  $ad
     * @param  \Illuminate\Database\Eloquent\Collection  $responses
     * @return bool
     */

    /*
    private function updateAdStatus($ad, $responses)
    {
        if ($responses->count() <= 0) {
            // Keep the ad active if no responses yet
            $ad->update(['active' => true]);
        } else {
            // Deactivate the ad if there are responses
            $ad->update(['active' => false]);
        }

        return true;
    }
    */
    private function updateAdStatus($ad, $responses)
    {
        $responseLimit = 1;

        if ($responses->count() >= $responseLimit) {
            $ad->update(['active' => false]);
        } else {
            $ad->update(['active' => true]);
        }

        return true;
    }
    /* we set only 2 responses for every ad, but here we check for one because current response add after this code. if we will use responseLimit 2 then Ad will deactivate after 3 responses. */
}


