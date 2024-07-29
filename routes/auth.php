<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('refresh_captcha', [LoginController::class, 'refreshCaptcha'])->name('refresh_captcha');
// Route::get('/login/verification', [LoginController::class, 'showOtpForm'])->name('login.verification.form');
// Route::post('/login/verification', [LoginController::class, 'confirmCode'])->name('login.verification');

// Registration
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::get('/become-a-sitter', [RegisterController::class, 'showSitterRegistrationForm'])->name('sitter.register.form');
Route::post('/become-a-sitter', [RegisterController::class, 'sitterRegister'])->name('sitter.register');

// Verification
Route::get('/user-email-verification', [VerificationController::class, 'showOtpFormEmail'])->name('verification.email.form');
Route::post('/user-email-verification', [VerificationController::class, 'verify'])->name('verification.email.');
Route::post('/user-email-verification/otp-code', [VerificationController::class, 'showOtpConfirmForm'])->name('email-otp-confirmation.form');
Route::post('/user-email-verification/otp-code', [VerificationController::class, 'confirmCodeEmail'])->name('email-otp-confirmation');
Route::post('/user-email-verification/resend', [VerificationController::class, 'resendCode'])->name('verification.email.resend');
// Route::get('register/verification/mobile', [VerificationController::class, 'showOtpFormMobile'])->name('verification.mobile.form');
// Route::post('register/verification/mobile', [VerificationController::class, 'confirmCodeMobile'])->name('verification.mobile');

// Forget Password
Route::get('/forget-password', [ForgotPasswordController::class, 'showEmailRequestForm'])->name('forgot.password.form'); // show email request form
Route::post('/forget-password', [ForgotPasswordController::class, 'forgot'])->name('forgot.password'); // show forget password form

// OTP Form
Route::get('/forget-password/email-verification', [ResetPasswordController::class, 'showOtpForm'])->name('forgot.verification.form'); // show otp form
Route::post('/forget-password/email-verification', [ResetPasswordController::class, 'confirmCode'])->name('forgot.verification'); // process otp form

// Reset Password
Route::get('/reset-password', [ResetPasswordController::class, 'showResetForm'])->name('reset.form'); // show password update form
Route::post('/reset-password', [ResetPasswordController::class, 'updatePassword'])->name('reset.password'); // process password update form

// Logout
Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});
