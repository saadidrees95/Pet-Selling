<?php

namespace App\Http\Controllers\PetOwner;

use App\Models\Ad;
use Carbon\Carbon;
use App\Models\PetImage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RepublishAdController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function republishAd(Request $request)
    {
        // return $request->all();
        // Create a new pet entry in the database
        $ad = Ad::findOrFail($request->id);
        $date = Carbon::now(); // Assuming you have a Carbon instance
        $formattedDate = $date->format('Y-m-d H:i:s'); // Format as 'YYYY-MM-DD HH:MM:SS'
        // dd($ad);

        // Create a new ad entry in the database
        $ad->update([

            'ref' => Str::random(8),
            'req_date' => $formattedDate,
            'active' => true,
        
        ]);

        // Redirect to the user's profile page with a success message
        return redirect()->route('profile')->with('success', 'Ad has been Republish Successfully!');
    }
    
}
