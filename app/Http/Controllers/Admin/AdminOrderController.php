<?php

namespace App\Http\Controllers\Admin;

use App\Exports\OrdersExport;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class AdminOrderController extends Controller
{
    public function index()
    {
        // Set page title
        $pageTitle = "Order List | Petlodger";

        // Get active ads with related details and paginate the results
        // Get pets details for profile page including type, age, size, medication, and images
        // used and purchased credits have multiple records and need loop for print data against any user.
        $orders = Order::with('package','user', 'user.userImage')
        ->orderBy('created_at', 'desc')
        ->paginate(3);
        // ->get();

        // dd($orders->toArray());
        return view('admin.order.index', compact('orders', 'pageTitle'));
    }

    public function exportOrders()
{
    return Excel::download(new OrdersExport, 'orders.csv');
}

}
