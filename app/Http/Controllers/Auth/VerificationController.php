<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;



class VerificationController extends Controller
{
    // Show Email OTP Form
    public function showOtpFormEmail()
    {
        // Generate OTP and send it to the user's email
        $otp = mt_rand(1000, 9999);
        $name = Session::get('full_name');
        $email = Session::get('email');

        $data = [
            'otp' => $otp,
            'name' => $name,
            'message' => 'Hello ' . $name . '! Thank you for registering on our Pet Care platform.Your OTP (One-Time Password) for email verification is: ' . $otp . 'If you did not create an account, no further action is required.',
        ];

        // dd($name, $email);

        $info = [
            'to_email' => $email,
            'to_name' => $name,
            'from_email' => 'support@petlodger.co.uk',
            'from_name' => 'Petlodger',
        ];

        Mail::send('emails/otp_verify', $data, function ($message) use ($info) {
            $message->to($info['to_email'], $info['to_name']);
            $message->from($info['from_email'], $info['from_name']);
            $message->subject('Petlodger - OTP Verification');
        });

        // Step 7: Store the OTP in the user's record (update in your database)
        // Auth::user()->update(['otp' => $otp]);
        // $user = Auth::user();
        // $user->otp = $otp;
        // $user->save();

        // Store the OTP and user's email in session for verification
        Session::put('otp', $otp);
        Session::put('otp_email', $email);

        // load otp confirmation form
        return view('auth.register.verify')->with('success', 'OTP sent to your email for verification!');
    }

    // OTP Confirmation Form
    public function confirmCodeEmail(Request $request)
    {

        $validatedData = $request->validate([
            'code1' => 'required|numeric|digits:1',
            'code2' => 'required|numeric|digits:1',
            'code3' => 'required|numeric|digits:1',
            'code4' => 'required|numeric|digits:1',
        ]);

        // Access the validated data
        $otpCode = implode('', $validatedData);

        // get data from session
        $otp = Session::get('otp');
        $email = Session::get('otp_email');
        // dd($otp, $email);

        // if otp verified and email not empty
        if ($otp == $otpCode && !empty($email)) {

            // Mark the OTP as verified and log in the user
            $user = User::where('email', $email)->update(['email_verified_at' => now()]);

            $user = User::where('email', $email)->first();

            auth()->login($user);


            $data = [
                'name' => $user->full_name,
                'message' => 'Hello ' . $user->full_name . '! You have been Successfully Registered',
            ];

            // dd($name, $email);

            $info = [
                'to_email' => $user->email,
                'to_name' => $user->full_name,
                'from_email' => 'support@petlodger.co.uk',
                'from_name' => 'Petlodger',
            ];

            Mail::send('emails.user_register', $data, function ($message) use ($info) {
                $message->to($info['to_email'], $info['to_name']);
                $message->from($info['from_email'], $info['from_name']);
                $message->subject('Petlodger - Successfull Registration');
            });

            $admin = User::where('role_id',1)->first();
            // Send notification to the admin
            $adminInfo = [
                'to_email' => $admin->email,  // Replace with the actual admin's email address
                'to_name' => $admin->full_name,
                'from_email' => 'support@petlodger.co.uk',
                'from_name' => 'Petlodger',
            ];

            $adminData = [
                'user_name' => $user->full_name,
                'user_email' => $user->email,
            ];

            Mail::send('emails.admin_notification', $adminData, function ($message) use ($adminInfo) {
                $message->to($adminInfo['to_email'], $adminInfo['to_name']);
                $message->from($adminInfo['from_email'], $adminInfo['from_name']);
                $message->subject('Petlodger - New User Registration');
            });

            // Redirect to a specific page after successful registration
            return redirect('profile')->with('success', 'Registration Successful! Welcome to our site.');
        } else {

            return redirect()->back()->with(['message' => 'Invalid OTP. Please try again.', 'class' => 'danger']);
        }
    }

    // Resend Code
    public function resendCode()
    {
        return redirect()->route('email-otp-confirmation.form');
    }


    // show otp for mobile verification
    public function showOtpFormMobile()
    {
        return view('auth.register.verify_mobile');
    }
    // show mobile confirmation code
    public function confirmCodeMobile(Request $request)
    {
        return $request;
    }
}
