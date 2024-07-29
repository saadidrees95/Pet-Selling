<?php

namespace App\Http\Controllers\Sitter;

use App\Models\User;
use App\Models\Order;
use App\Models\Credit;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Models\PurchaseCredit;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Exception\RequestException;

class SumUpPaymentController extends Controller
{
    // properties
    private $appId;
    private $appSecret;
    private $grantType;
    private $merchantEmail;

    private $accessToken;
    private $tokenError;
    private $checkoutResourceId;
    private $checkoutResourceError;
    private $checkoutResponse;
    private $checkoutResponseError;
    private $httpClient;
    private $orderDetails = [];
    private $cardDetails = [];

    // Load Basic Properties
    public function __construct(Client $guzzleClient)
    {
        // $this->httpClient = $guzzleClient;
        $this->appId = env('SUMUP_APP_ID');
        $this->appSecret = env('SUMUP_APP_SECRET');
        $this->grantType = env('SUMUP_GRANT_TYPE');
        $this->merchantEmail = env('SUMUP_MERCHANT_EMAIL');
    }

    // Process Payment
    public function processPayment(Request $request)
    {
        // Validate Request
        $this->validatePayRequest($request);

        // Set Order Attributes
        $this->orderDetails = [
            'amount' => $request->total,
            'currency' => 'GBP',
            'checkout_reference' => 'CO' . mt_rand(100000, 999999),
            'pay_to_email' => $this->merchantEmail,
            'description' => 'one-time payment',
        ];
        // Set Card Attributes
        $this->cardDetails = [
            'name' => $request->card_name,
            'number' => $request->card_number,
            'expiry_month' => $request->expiry_month,
            'expiry_year' => $request->expiry_year,
            'cvv' => $request->cvv,
        ];
        // Get Access Token
        $this->getAccessToken();

        // Create Checkout Resource
        $this->createCheckoutResource();

        // Complete Checkout Process
        $this->completeCheckout();

        // Create Order
        $this->createOrder($request);

        // // Forget records from session
        // $request->session()->forget(['package', 'price', 'credit', 'user_id']);
        
        // Redirect to the sitter's profile page with a success message
        $message = '<h2>Thank you for your purchase!</h2><br><p>Your credits have been successfully transferred to your account.</p>';
        return redirect()->route('sitter.profile')->with('success', $message);
        
    
    }

    // Get Access Token
    private function getAccessToken()
    {
        // create HTTP client instance
        $response = Http::post('https://api.sumup.com/token', [

            // Request Header with URL encoded
                'grant_type' => $this->grantType,
                'client_id' => $this->appId,
                'client_secret' => $this->appSecret,
            ], [
                'headers' => ['Content-Type' => 'application/x-www-form-urlencoded'],
            ]);


        // if response is not empty and status code is == 200 so it is valid request
        if (!empty($response) && $response->status() == 200) {
            
            $data = $response->json();
            // Convert json response into array
            if (isset($data['access_token'])){
                // Get and store access_token 
                $this->accessToken = $data['access_token'];
            }else{
                // Get and store access_token 
                 $this->accessToken = null;
            }
            // dd( $this->accessToken);
            // return Access Token
            return $this->accessToken;

        } else { // if response is not empty and status code is == 400 so it is in-valid request
            
            // parse JSON response
            $data = $response->json();
            if (isset($data['error'])) {
                // store the access token for later use
                $this->tokenError = $data['error'];
            }else{
                // save response error satus code
                $this->tokenError = $response->status();
            }
            // dd($this->tokenError);
            
            // Logging
            \Log::error('Error in SumUpPaymentController: ' . $this->tokenError);
            // Or use Monolog if you need more advanced logging

            // return $this->accessToken;
            return redirect()->back()->with('error', 'Sorry Unknown Error. Please try again later!');
        }
            
    }

    // Create Checkout Resources
    private function createCheckoutResource()
    {
        
       // create HTTP client instance
        $response = Http::withHeaders([

                // Request Header 
                'Authorization' => 'Bearer ' . $this->accessToken,
                'Content-Type' => 'application/json',
            
                ])->post('https://api.sumup.com/v0.1/checkouts', [

                // Request body    
                'checkout_reference' => $this->orderDetails['checkout_reference'],
                'amount' => $this->orderDetails['amount'],
                'currency' => $this->orderDetails['currency'],
                'pay_to_email' => 'info@petlodger.co.uk',
                'description' => $this->orderDetails['description'],
                
            ]);
            // dd($response);
 
        // if response is not empty and status code is == 200 so it is valid request
        if (!empty($response) && $response->status() == 201) {

            $data = $response->json();
            // Convert json response into array

            if (isset($data['id'])) {
                // Get and store access_token 
                $this->checkoutResourceId = $data['id'];

            }else{
                // Get and store access_token 
                $this->checkoutResourceId = null;
            }
            // dd($this->checkoutResourceId);
            // return Access Token
            return $this->checkoutResourceId;

        } else{
            // if response is not empty and status code is == 400 so it is in-valid request

            $data = $response->json();
            // Convert json response into array
            if (isset($data['error'])) {
                // Get and save error     
                $this->checkoutResourceError = $data['error'];

            }else{
                // Get and save error     
                $this->checkoutResourceError =  $response->status();
            }
            // dd($this->checkoutResourceError);
            
            // Logging
            \Log::error('Error in SumUpPaymentController: ' . $this->checkoutResourceError);
            // Or use Monolog if you need more advanced logging

            // return Checkout Resource Error
            // return $this->checkoutResourceError;
            return redirect()->back()->with('error', $this->checkoutResourceError . ' Please try again later!');                        
        }

    }

    private function completeCheckout()
    {
            $response = Http::withHeaders([
                //Request Header
                'Authorization' => 'Bearer ' . $this->accessToken,
                'Content-Type' => 'application/json',

            ])->put("https://api.sumup.com/v0.1/checkouts/{$this->checkoutResourceId}", [

                // Request Body
                'payment_type' => 'card',
                'card' => [
                    'name' => $this->cardDetails['name'],
                    // 'number' => $this->cardDetails['number'],
                    'number' => '4929398594543223',
                    'expiry_month' => $this->cardDetails['expiry_month'],
                    'expiry_year' => $this->cardDetails['expiry_year'],
                    'cvv' => $this->cardDetails['cvv'],
                ],
            ]);
            // dd($response);
        // if response is not empty and status code is == 200 so it is valid request
        if (!empty($response) && $response->status() == 200) {

            // Convert json response into array
            $data = $response->json();
 
            // Get data from response and save 
            $this->checkoutResponse = [
                'id' => data_get($data, 'id'),
                'status' => data_get($data, 'status'),
                'date' => data_get($data, 'date'),
            ];
            // dd($this->checkoutResponse);
            // return Access Token
            return $this->checkoutResponse;

        } else {
            // if response is not empty and status code is == 400 so it is in-valid request

            $data = $response->json();
            // Convert json response into array
            if (isset($data['error'])) {
                // Get and save error     
                $this->checkoutResponseError = $data['error'];

            }else{
                $this->checkoutResponseError = $response->status();          
            }
            //   dd($this->checkoutResourceError);
             
            // Example Logging
            \Log::error('Error in SumUpPaymentController: ' . $this->checkoutResponseError);
            // Or use Monolog if you need more advanced logging

            // return Checkout Resource Error
            // return $this->checkoutResourceError;
            return redirect()->back()->with('error', $this->checkoutResponseError . ' Please try again later!');
        }



    }


    // Validate Form Request
    private function validatePayRequest(Request $request)
    {
        $request->validate([
            'subtotal' => 'required|numeric',
            'vat' => 'required|numeric',
            'total' => 'required|numeric',
            'email' => ['required', 'email'],
            'full_name' => ['required', 'string'],
            'card_name' => ['required', 'string'],
            'card_number' => ['required', 'numeric', 'digits:16'],
            'expiry_month' => ['required', 'numeric', 'digits:2'],
            'expiry_year' => ['required', 'numeric', 'digits:2'],
            'cvv' => ['required', 'numeric', 'digits:3'],
        ]);
    }
    
    // After Successfull Payment Collection
    // Create Order
    private function createOrder($request)
    {
        // dd($request);
        // validate request
        $this->validatePayRequest($request);

        // Retrieve package details from the session
        $packageDetails = session('package');
        // dd($packageDetails);

        // Step 3: Create Order
        $user_id = Auth::id();
        $order = Order::create([
            'total_amount' => $request->price,
            'credits' => $request->credits,
            'payment_status' => $this->checkoutResponse['status'],
            'transaction_id' => $this->checkoutResponse['id'],
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
        $user = User::find($user_id);
        // if record exist then update it, if not exist then create new record
        if ($user && $user->credits) {
            $user->credits->increment('balance', $purchase_credits->credit);
        } else {
            // create new record if the user or credits relationship is null
            $credits = Credit::create([
                'balance' => $order->credits,
                'user_id' => $user_id,
            ]);
        }

    }
    
    
}