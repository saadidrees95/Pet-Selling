<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Subscriber;
use App\Models\SitterReview;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminSubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Set page title
        $pageTitle = "Subscriber List | Petlodger";

        // Get active ads with related details and paginate the results
        // Get pets details for profile page including type, age, size, medication, and images
        $subscribers = Subscriber::orderBy('created_at', 'desc')
            ->paginate(6);

        // dd($sitters->address->city);
        return view('admin.subscriber.index', compact('subscribers', 'pageTitle'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // return $id;
        $subscriber = Subscriber::findOrFail($id);
        $subscriber->delete();

        // return $service;
        return redirect()->route('admin.subscriber.lists')->with('success', 'Subscriber deleted successfully');
    }
}
