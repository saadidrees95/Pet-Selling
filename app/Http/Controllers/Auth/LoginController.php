<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

/**
 * Class LoginController
 *
 * @package App\Http\Controllers\Auth
 */
class LoginController extends Controller
{
    /**
     * Show the login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        // Set the page title for the login form
        $pageTitle = "Login Form";
        return view('auth.login.login', compact('pageTitle'));
    }

    /**
     * Handle user login attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        // Validate user input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
            'captcha' => 'required|captcha',
        ]);

        // Attempt to authenticate the user
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            // Determine redirect route based on user role
            $redirectRoute = ''; // Initialize as an empty string

            if (Auth::user()->role_id === 4) {
                $redirectRoute = 'profile'; // Redirect to user dashboard
            } elseif (Auth::user()->role_id === 5) {
                $redirectRoute = 'sitter.profile'; // Redirect to sitter dashboard
            } elseif (in_array(Auth::user()->role_id, [1, 2, 3])) {
                $redirectRoute = 'admin.dashboard'; // Redirect to admin dashboard for roles 1, 2, and 3
            }

            // Redirect user to the appropriate dashboard
            return redirect()->intended(route($redirectRoute));
        } else {
            // Handle Failed Authentication: Redirect back to login form with error message
            return redirect()->back()->withErrors(['email' => 'Invalid credentials']);
        }
    }

    /**
     * Show the OTP verification form.
     *
     * @return \Illuminate\View\View
     */
    public function showOtpForm()
    {
        // Set the page title for OTP verification form
        $pageTitle = "OTP Verification";
        return view('auth.login.verify', compact('pageTitle'));
    }

    public function refreshCaptcha()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }

    /**
     * Confirm the OTP code.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function confirmCode(Request $request)
    {
        // Handle OTP confirmation logic here (not implemented in the provided code)
        // This function should contain the logic to verify the entered OTP code.
        // Return appropriate response based on the verification result.
        return $request; // Placeholder, replace it with actual logic
    }

    /**
     * Logout the authenticated user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        // Logout the user
        Auth::logout();

        // Invalidate session and regenerate CSRF token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect to the landing page with a success message
        return redirect('/')->with('success', 'You have been logged out.');
    }
}
