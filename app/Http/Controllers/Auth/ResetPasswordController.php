<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;


class ResetPasswordController extends Controller
{

    // Step-3: Show OTP Form
    public function showOtpForm()
    {

        return view('auth.passwords.verify')->with('success', 'OTP sent to your email for verification!');
    }

    // Step-4: OTP Confirmation Process
    public function confirmCode(Request $request)
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


            // Redirect to a specific page after successful registration
            return redirect()->route('reset.form')->with('success', 'Email verified successfully!');
        } else {

            // return redirect back with error message
            return redirect()->back()->with(['message' => 'Invalid OTP. Please try again.', 'class' => 'danger']);
        }
    }

    // Resend OTP 
    public function resendCode()
    {
        return redirect()->route('email-otp-confirmation.form');
    }


    // Step-5: Show Password Update Form
    public function showResetForm()
    {
        return view('auth.passwords.reset');
    }

    // Step-6: Process Password Update Form
    public function updatePassword(Request $request)
    {
        // validate request
        $validatedData = $request->validate([
            'new_password' => 'required|string|max:32',
        ]);

        // Get the authenticated user
        $email = Session::get('otp_email');
        $user = User::where('email', $email)->first();

        // Update the user's password
        $user->update([
            'password' => Hash::make($request->input('new_password')),
        ]);

        auth()->login($user);

        // delete otp and email from session
        Session::forget(['otp', 'otp_email']);

        // Redirect to a specific page after successful registration
        return redirect('profile')->with('success', 'Your password has been reset successfully!');
    }
}
