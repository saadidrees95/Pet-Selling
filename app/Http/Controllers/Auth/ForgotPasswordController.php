<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;


class ForgotPasswordController extends Controller
{
    // Step-1: Show Forget Password Form
    public function showEmailRequestForm()
    {

        return view('auth.passwords.confirm');
    }

    // Step-2: Process Forget Password Form 
    public function forgot(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        // Get user email from request
        $user = $this->getUser($request->email);

        // Generate OTP
        $otp = $this->generateOtp();

        // Update password token
        $this->updatePasswordResetTokens($request->email, $otp);

        // Build Email Data
        $data = $this->buildEmailData($user, $otp);

        // dd($otp, $request->email);
    
        // Set data in session
        Session::put('otp', $otp); 
        Session::put('otp_email', $request->email);

        // check session
        // dump(session()->all());

        $info = [
            'to_email' => $user->email,
            'to_name' => $user->full_name,
            'from_email' => 'support@petlodger.co.uk',
            'from_name' => 'Petlodger',
        ];

        // Send Email
        $this->sendEmail($info, $data);

        // return to the verification form
        return redirect()->route('forgot.verification.form')->with('success', 'We have sent an email containing your password reset OTP.');
    }



    /**
     * 
     * @private methods
     * which are using in @forget()
     */



    // Private Functions:    
    private function getUser($email)
    {
        return User::where('email', $email)->first();
    }

    // Private Functions: 
    private function generateOtp()
    {
        return mt_rand(1000, 9999);
    }
    
    // Private Functions: 
    private function updatePasswordResetTokens($email, $otp)
    {
        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $email],
            [
                'token' => $otp,
                'created_at' => now(),
            ]
        );
    }

    // Private Functions: 
    private function buildEmailData($user, $otp)
    {
        return [
            'otp' => $otp,
            'name' => $user->full_name,
            'message' => 'Hello ' . $user->full_name . '! Your request to reset your password has been received. Your OTP (One-Time Password) for email verification is: ' . $otp . ' If you did not request, no further action is required.',
        ];
    }

    // Private Functions: 
    private function sendEmail($info, $data)
    {
        Mail::send('emails/reset_password', $data, function ($message) use ($info) {
            $message->to($info['to_email'], $info['to_name']);
            $message->from($info['from_email'], $info['from_name']);
            $message->subject('Petlodger - OTP Verification');
        });
    }




}
