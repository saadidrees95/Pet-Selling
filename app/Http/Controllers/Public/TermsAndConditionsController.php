<?php

namespace App\Http\Controllers\Public;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TermsAndConditionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('web.page.terms_and_conditions');
    
    }
    
}
