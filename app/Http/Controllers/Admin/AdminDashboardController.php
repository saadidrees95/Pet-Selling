<?php

namespace App\Http\Controllers\Admin;

use App\Models\Ad;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Set page title
        $pageTitle = "Admin Dashboard | Petlodger";
        // Get active ads with related details and paginate the results
        // Get pets details for profile page including type, age, size, medication, and images
        // used and purchased credits have multiple records and need loop for print data against any user. 
        $orders = Order::with('package', 'user', 'user.userImage')
        ->orderBy('created_at', 'desc')
        ->take(10)
        ->get();


        // Retrieve total sales for the current week
        $totalSales = Order::select('total_amount')->sum('total_amount');

        // Retrieve total users
        $totalUsers = User::count();

        // Retrieve total ads
        $totalAds = Ad::count();

        // Retrieve total orders for the current week
        $totalOrders = Order::count();

        // dd($totalSales, $totalUsers, $totalAds, $totalOrders);

        return view('admin.dashboard.index', compact('orders', 'pageTitle', 'totalSales', 'totalUsers', 'totalAds', 'totalOrders'));
    }
}
