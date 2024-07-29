<?php

namespace App\Http\Controllers\Public;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HouseSitterController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return redirect()->route('home');
        // return "House Sitter Lists!";
    }
}
