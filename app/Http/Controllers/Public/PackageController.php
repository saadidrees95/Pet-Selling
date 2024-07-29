<?php

namespace App\Http\Controllers\Public;

use App\Models\Package;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PackageController extends Controller
{
    /**
     * Display the package selection page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $packages = Package::get();
        
        return view('web.page.package', compact('packages'));
    }

    /**
     * Handle the package purchase form submission.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function buyPackage(Request $request)
    {
        // Validate the request data
        $request->validate([
            'package' => 'required',
            'package_id' => 'required',
            'price' => 'required',
            'credit' => 'required',
        ]);

        // Forget previous records from session
        $request->session()->forget(['package', 'price', 'credit', 'user_id']);
        
        // Store package details in the session as an associative array
        $request->session()->put('package', [
            'package' => $request->package,
            'package_id' => $request->package_id,
            'price' => $request->price,
            'credit' => $request->credit,
            'user_id' => Auth::user()->id,
        ]);

        // Redirect to the checkout form
        return redirect()->route('checkout.form');
    }
}
