<?php

namespace App\Http\Controllers\Public;

use App\Models\Subscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Validation\ValidationException;

class SubscriberController extends Controller
{
     /**
     * Display a listing of the resource.
     */

    public function subscribeNow(Request $request)
    {
        // dd($request->all());

        // Validate the request
        $request->validate([
            'email' => 'required|email|unique:subscribers,email',
        ]);

        // Logic to store the subscriber's email in the database
        // For simplicity, I'm assuming you have a "subscribers" table
        Subscriber::create([
            'email' => $request->email,
        ]);

        // You can return a success response if needed
        return response()->json(['message' => 'You have subscribed successfully!']);

    }


}
