<?php

namespace App\Http\Controllers\Public;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PreSignupController extends Controller
{
    /**
     * Display Role Selection Page.
     */
    public function index()
    {
        return view('web.page.pre-signup');
    }
}

