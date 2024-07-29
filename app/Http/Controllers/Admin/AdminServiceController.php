<?php

namespace App\Http\Controllers\Admin;

use App\Models\Ad;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AdminServiceController extends Controller
{

    public function index()
    {
        $pageTitle = "Service List | Petlodger";
        $services = Service::orderBy('created_at', 'desc')->paginate(8);
        // return service list
        return view('admin.service.index', compact('services', 'pageTitle'));
    }

    public function create()
    {
        $pageTitle = "Create New Service | Petlodger";
        return view('admin.service.add', compact('pageTitle'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'short_desc' => 'required|string',
            'long_desc' => 'required|string',
        ]);

        Service::create([
            'title' => $request->title,
            'short_description' => $request->short_desc,
            'long_description' => $request->long_desc,
        ]);

        return redirect()->route('admin.service.lists')->with('success', 'Service created successfully');
    }

    public function show(string $id)
    {
        $pageTitle = "Service Details | Petlodger";
        $service = Service::findOrFail($id);

        return view('admin.service.view', compact('service', 'pageTitle'));
    }

    public function edit($id)
    {
        $pageTitle = "Service Edit | Petlodger";
        $service = Service::findOrFail($id);
        return view('admin.service.edit', compact('service', 'pageTitle'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'title' => 'required|string',
            'short_desc' => 'required|string',
            'long_desc' => 'required|string',
        ]);

        $service = Service::findOrFail($request->id);

        $service->update([
            'title' => $request->title,
            'short_description' => $request->short_desc,
            'long_description' => $request->long_desc,
        ]);

        return redirect()->route('admin.service.lists')->with('success', 'Service updated successfully');
    }

    public function destroy($id)
    {
        // return $id;
        $service = Service::findOrFail($id);
        $service->delete();

        // return $service;
        return redirect()->route('admin.service.lists')->with('success', 'Service deleted successfully');
    }

    public function dayCation()
    {
        // Set page title
        $pageTitle = "Daycation List | Petlodger";
        $title = "Daycation";

        // Get active ads with related details and paginate the results
        $ads = Ad::with('responses', 'service', 'views', 'pets.type', 'pets.age', 'pets.size', 'pets.medication', 'pets.image', 'user.address', 'user.userImage')
            ->where('service_id', 1)
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        // dd($ads->toArray());
        return view('admin.service.listing.day_cation', compact('ads', 'title', 'pageTitle'));
    }
    public function catCation()
    {
        // Set page title
        $pageTitle = "Catcation List | Petlodger";
        $title = "Catcation";

        // Get active ads with related details and paginate the results
        $ads = Ad::with('responses', 'service', 'views', 'pets.type', 'pets.age', 'pets.size', 'pets.medication', 'pets.image', 'user.address', 'user.userImage')
            ->where('service_id', 2)
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        // dd($ads->toArray());
        return view('admin.service.listing.cat_cation', compact('ads', 'title', 'pageTitle'));
    }
    public function stayCation()
    {
        // Set page title
        $pageTitle = "Staycation List | Petlodger";
        $title = "Staycation";

        // Get active ads with related details and paginate the results
        $ads = Ad::with('responses', 'service', 'views', 'pets.type', 'pets.age', 'pets.size', 'pets.medication', 'pets.image', 'user.address', 'user.userImage')
            ->where('service_id', 3)
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        // dd($ads->toArray());
        return view('admin.service.listing.stay_cation', compact('ads', 'title', 'pageTitle'));
    }
    public function dropAndVisit()
    {
        // Set page title
        $pageTitle = "At Own House List | Petlodger";
        $title = "At Own House List";

        // Get active ads with related details and paginate the results
        $ads = Ad::with('responses', 'service', 'views', 'pets.type', 'pets.age', 'pets.size', 'pets.medication', 'pets.image', 'user.address', 'user.userImage')
            ->where('service_id', 4)
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        // dd($ads->toArray());
        return view('admin.service.listing.drop_n_visit', compact('ads', 'title', 'pageTitle'));
    }
    public function houseSitting()
    {
        // Set page title
        $pageTitle = "At Carer House List | Petlodger";
        $title = "At Carer House List";

        // Get active ads with related details and paginate the results
        $ads = Ad::with('responses', 'service', 'views', 'pets.type', 'pets.age', 'pets.size', 'pets.medication', 'pets.image', 'user.address', 'user.userImage')
            ->where('service_id', 5)
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        // dd($ads->toArray());
        return view('admin.service.listing.house_sitting', compact('ads', 'title', 'pageTitle'));
    }
    public function dogCation()
    {
        // Set page title
        $pageTitle = "Dogcation List | Petlodger";
        $title = "Dogcation";

        // Get active ads with related details and paginate the results
        $ads = Ad::with('responses', 'service', 'views', 'pets.type', 'pets.age', 'pets.size', 'pets.medication', 'pets.image', 'user.address', 'user.userImage')
            ->where('service_id', 6)
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        // dd($ads->toArray());
        return view('admin.service.listing.dog_cation', compact('ads', 'title', 'pageTitle'));
    }

}
