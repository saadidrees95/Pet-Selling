<?php

namespace App\Http\Controllers\Public;


use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    /**
     * Display the Daycation service page.
     *
     * @return \Illuminate\View\View
     */
    public function dayCation()
    {
        return view('web.page.services.daycation');
    }

    /**
     * Display the Catcation service page.
     *
     * @return \Illuminate\View\View
     */
    public function catCation()
    {
        return view('web.page.services.catcation');
    }

    /**
     * Display the Dogcation service page.
     *
     * @return \Illuminate\View\View
     */
    public function dogCation()
    {
        return view('web.page.services.dogcation');
    }

    /**
     * Display the Staycation service page.
     *
     * @return \Illuminate\View\View
     */
    public function stayCation()
    {
        return view('web.page.services.staycation');
    }

    /**
     * Display the Housesitting service page.
     *
     * @return \Illuminate\View\View
     */
    public function houseSitting()
    {
        return view('web.page.services.housesitting');
    }

    /**
     * Display the Drop and Visit service page.
     *
     * @return \Illuminate\View\View
     */
    public function dropAndVisit()
    {
        return view('web.page.services.drop_and_visit');
    }
}
