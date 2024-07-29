<?php

namespace App\Http\Controllers\Sitter;

use App\Models\User;
use App\Models\Order;
use App\Models\Credit;
use Illuminate\Http\Request;
use App\Models\PurchaseCredit;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SitterCheckoutController extends Controller
{

    /**
     * Display the checkout form with package details.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function checkoutForm(Request $request)
    {
 
        // Retrieve package details from the session
        $packageDetails = session('package');
        
        // Calculate order summary including subtotal, VAT, and total
        $subtotal = number_format($packageDetails['price'], 2);
        $vat = number_format($packageDetails['price'] * 10 / 100, 2);
        $total = number_format($subtotal + $vat, 2);
        // rape in array
        $order_summary = [
            'subtotal' => number_format($packageDetails['price'], 2),
            'vat' => number_format($packageDetails['price'] * 10 / 100, 2),
            'total' => number_format($subtotal + $vat, 2),
        ];

        $user = Auth::user();

        return view('web.sitter.checkout.view', compact('user', 'packageDetails', 'order_summary'));
    }

    /**
     * Process the payment and complete the checkout process.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function checkout(Request $request)
    {
        // dd($request->all());
        // Step 1: Validate Inputs
        $request->validate([
            'package' => 'required',
            'credits' => 'required',
            'price' => 'required',
            // 'coupon_code' => 'required',
            'subtotal' => 'required',
            'vat' => 'required',
            'total' => 'required',
            'email' => 'required',
            'full_name' => 'required',
            'card_name' => 'required',
            'card_number' => 'required',
            'exp_date' => 'required',
            'cvv' => 'required',
        ]);

        // Step 2: Simulate Payment Authorization (Sumup API)
        $response = [
            'payment_status' => 1,
            'transaction_id' => '12456789',
        ];
        $payment_status = $response['payment_status'];
        $transaction_id = $response['transaction_id'];

        // Retrieve package details from the session
        $packageDetails = session('package');

        // Step 3: Create Order
        $user_id = Auth::id();
        $order = Order::create([
            'total_amount' => $request->price,
            'credits' => $request->credits,
            'payment_status' => $payment_status,
            'transaction_id' => $transaction_id,
            'package_id' => $packageDetails['package_id'],
            'user_id' => $user_id,
        ]);

        // Step 4: Update Credit Purchase
        $purchase_credits = PurchaseCredit::create([
            'credit' => $order->credits,
            'user_id' => $user_id,
            'order_id' => $order->id,
        ]);

        // Step 5: Update Credit's Balance
        // User::find(Auth::id())->credits->increment('balance', $purchase_credits->credit);
        // Step 5: Update Credit's Balance
        $user = User::find($user_id);
        if ($user && $user->credits) {
            $user->credits->increment('balance', $purchase_credits->credit);
        } else {
            // Handle the case where the user or credits relationship is null
            // Step 4: Update Credit Purchase
            $credits = Credit::create([
                'balance' => $order->credits,
                'user_id' => $user_id,
            ]);
        }

        // Forget records from session
        $request->session()->forget(['package', 'price', 'credit', 'user_id']);

        // Step 5: Redirect to Sitter Profile
        // Redirect to the sitter's profile page with a success message
        return redirect()->route('sitter.profile')->with('success', 'Thank you for your purchase!');
        // return redirect()->route('initiatePayment');

        
    }
}
