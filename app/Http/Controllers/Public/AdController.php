<?php

namespace App\Http\Controllers\Public;

use App\Models\Ad;
use App\Models\Pet;
use App\Models\AdView;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PetType;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    /*
    // get unique records from collection and show in filter table
    public function index()
    {
        // Get active ads with related details and paginate the results
        $ads = Ad::with('pets.type', 'pets.age', 'pets.size', 'pets.medication', 'pets.image', 'service', 'user.address', 'user.userImage')
            ->where('active', 1)
            ->orderBy('created_at', 'desc')
            ->paginate(5);
   
        // query for advance filter from
        $data = Ad::with('service', 'pets.type', 'user.address')
            ->get();

        // Collect unique records based on the 'service' relationship
        $services = $data->unique(function ($item) {
                return $item->service->id; // Assuming 'id' is the key for uniqueness in the 'service' relationship
            });

        // Collect unique records based on the 'pets.type' relationship
        $pets = $data->unique(function ($item) {
                return $item->pets->type->id; // Assuming 'id' is the key for uniqueness in the 'pets.type' relationship
            });

        // Collect unique records based on the 'pets.type' relationship
        $days = $data->unique(function ($item) {
                return $item->duration; // Assuming 'id' is the key for uniqueness in the 'pets.type' relationship
            });

        // Collect unique records based on the 'pets.type' relationship
        $behaviors = $data->unique(function ($item) {
                return $item->pets->behavior; // Assuming 'id' is the key for uniqueness in the 'pets.type' relationship
            });       

        // dd($services->toArray());
        // Return the view with the ads data
        return view('web.ad.lists', compact('ads', 'services' , 'pets', 'days', 'behaviors'));
    }
    */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */

    // get unique records from collection and show in filter table
    public function index()
    {
        // Get active ads with related details and paginate the results
        $ads = Ad::with('pets.type', 'pets.age', 'pets.size', 'pets.medication', 'pets.image', 'service', 'responses', 'user.address', 'user.userImage')
            ->where('active', 1)
            ->orderBy('created_at', 'desc')
            ->paginate(5);
   
        // query for advance filter from
        $services = Service::get();
        $petTypes = PetType::get();

        // dd($type->toArray());
        // Return the view with the ads data
        return view('web.ad.lists', compact('ads', 'services' , 'petTypes'));
    }
    /**
     * Display the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\View\View
     */
    public function show(string $id)
    {
        // Get the active ad with related details by ID
        $ad = Ad::with('pets.type', 'pets.age', 'pets.size', 'pets.medication', 'pets.image', 'user.address', 'user.userImage', 'responses',)
            ->where('active', 1)
            ->find($id);

        // Return the view with the ad data
        return view('web.ad.view', compact('ad'));
    }

    public function filterAds(Request $request)
    {
        // dd($request->all());
        $keyword = $request->input('keyword');
        $days = $request->input('duration');
        $service_id = $request->input('service_id');
        $pet_id = $request->input('pet_id');
        $behavior = $request->input('behavior');
        $date = $request->input('date');
        $location = $request->input('location');

        $ads = Ad::where(function ($query) use ($keyword) {
            $query->where('title', 'like', '%' . $keyword . '%')
                ->orWhere('about', 'like', '%' . $keyword . '%');
        })
            ->when($days, function ($query) use ($days) {
                $query->where('duration', '=', $days);
            })
            ->when($service_id, function ($query) use ($service_id) {
                $query->where('service_id', '=', $service_id);
            })
            ->when($pet_id, function ($query) use ($pet_id) {
                $query->where('pet_id', '=', $pet_id);
            })
            ->when($behavior, function ($query) use ($behavior) {
                $query->whereHas('pets', function ($subQuery) use ($behavior) {
                    $subQuery->where('behavior', 'like', '%' . $behavior . '%');
                });
            })
            ->when($date, function ($query) use ($date) {
                $query->whereDate('req_date', '=', $date);
            })
            ->when($location, function ($query) use ($location) {
                $query->whereHas('user.address', function ($subQuery) use ($location) {
                    $subQuery->where('street', 'like', '%' . $location . '%')
                        ->orWhere('post_code', 'like', '%' . $location . '%')
                        ->orWhere('city', 'like', '%' . $location . '%');
                });
            })
            ->orderBy('created_at', 'desc')
            ->paginate(5);
        // ->get();

        // query for advance filter from
        $services = Service::get();
        $petTypes = PetType::get();

        // dd($ads->toArray());
        // Return the view with the ads data
        return view('web.ad.lists', compact('ads', 'services', 'petTypes'));
    }

    
    /**
     * Mark the user's response to the ad.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Ad  $ad
     * @return bool
     */
    private function markUserResponse($user, $ad)
    {
        // Generate a unique token for the user's response
        $userResponseToken = md5($user->id . $ad->id);

        // Create a new record in AdView table to track the user's response
        if ($ad->id) {
            AdView::create([
                'token' => $userResponseToken,
                'views_count' => 1,
                'user_id' => $user->id,
                'ad_id' => $ad->id,
            ]);

            return true;
        }

        return false;
    }
}
