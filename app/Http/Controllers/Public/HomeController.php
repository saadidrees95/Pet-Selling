<?php

namespace App\Http\Controllers\Public;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $dayCation = Service::where('id', 1)->get();
        // $catCation = Service::where('id', 2)->get();
        // $stayCation = Service::where('id', 3)->get();
        // $dropAndVisit = Service::where('id', 4)->get();
        // $houseSitting = Service::where('id', 5)->get();
        // $dogCation = Service::where('id', 6)->get();

        // return view('web.page.home', compact('services', 'dayCation', 'catCation', 'stayCation', 'dropAndVisit', 'houseSitting', 'dogCation'));
        $services = Service::all();
         return view('web.page.home',compact('services'));
    }
}
