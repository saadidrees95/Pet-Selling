<?php

namespace App\Http\Controllers\Sitter;

use SumUp\SumUp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SitterPaymentController extends Controller
{
    /**
     * The SumUp instance.
     *
     * @var \SumUp\SumUp
     */
    protected $sumup;

    /**
     * Create a new controller instance.
     *
     * @param  \SumUp\SumUp  $sumup
     * @return void
     */
    public function __construct(SumUp $sumup)
    {
        $this->sumup = $sumup;
    }

    /**
     * Show the payment form.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('payment');
    }

    /**
     * Create a payment link and redirect the user to it.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function pay(Request $request)
    {
        // Validate the request data
        $request->validate([
            'amount' => 'required|numeric|min:0.01',
            'currency' => 'required|string|size:3',
            'reference' => 'required|string|max:128',
            'email' => 'required|email',
            'description' => 'nullable|string|max:255',
        ]);

        // Get the request data
        $amount = $request->input('amount');
        $currency = $request->input('currency');
        $reference = $request->input('reference');
        $email = $request->input('email');
        $description = $request->input('description');

        // Get the checkout service from SumUp
        $checkoutService = $this->sumup->getCheckoutService();

        // Create a payment link
        $checkoutResponse = $checkoutService->create($amount, $currency, $reference, $email, $description);

        // Get the payment link URL
        $paymentLink = $checkoutResponse->getBody()->checkout_url;
        
        // Redirect the user to the payment link
        return redirect($paymentLink);
    }
}
