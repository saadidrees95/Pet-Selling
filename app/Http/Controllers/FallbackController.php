<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FallbackController extends Controller
{
    /**
     * Handle fallback routes.
     *
     * This method is responsible for handling "not found" URLs and can be used to redirect
     * users to a custom 404 page or perform any other necessary actions.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function handle(Request $request)
    {
        // Handle the "not found" URLs here, for example, redirect to a custom 404 page
        return response()->view('errors.404', [], 404);
    }
}
