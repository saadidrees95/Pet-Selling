<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Public\PackageController;
use App\Http\Controllers\Sitter\SitterAdController;
use App\Http\Controllers\Sitter\SitterAboutController;
use App\Http\Controllers\Sitter\SitterReviewController;
use App\Http\Controllers\Sitter\SumUpPaymentController;
use App\Http\Controllers\Sitter\SitterPaymentController;
use App\Http\Controllers\Sitter\SitterProfileController;
use App\Http\Controllers\Sitter\SitterCheckoutController;
/*
|--------------------------------------------------------------------------
| Sitter Routes
|--------------------------------------------------------------------------
|
| Here is where you can register sitter routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

Route::middleware(['auth', 'sitter'])->group(function () {
    // Checkout
    Route::get('/sitter/checkout', [SitterCheckoutController::class, 'checkoutForm'])->name('checkout.form');
    Route::post('/sitter/checkout', [SitterCheckoutController::class, 'checkout'])->name('checkout');

    //SumUp Payment API
    Route::post('/sitter/process-payment', [SumUpPaymentController::class, 'processPayment'])->name('pay');
    Route::get('/sitter/thank-you', [SumUpPaymentController::class, 'thankYou'])->name('thankYou');

    // Package
    Route::post('/buy-a-package', [PackageController::class, 'buyPackage'])->name('buyPackage');

    // Sitter
    Route::get('/sitter/profile', [SitterProfileController::class, 'index'])->name('sitter.profile');
    Route::get('/sitter/profile/{id}/edit', [SitterProfileController::class, 'edit'])->name('sitter.profile.edit');
    Route::get('/sitter/profile/{user}/delete', [SitterProfileController::class, 'delete'])->name('sitter.profile.delete');
    Route::put('/sitter/profile/update', [SitterProfileController::class, 'update'])->name('sitter.profile.update');
    Route::get('/sitter/profile/{id}/change-password', [SitterProfileController::class, 'changePassword'])->name('sitter.password.change');
    Route::post('/sitter/profile/update-password', [SitterProfileController::class, 'updatePassword'])->name('sitter.password.update');
    // Route::post('/sitter/profile/{id}/delete-account', [SitterProfileController::class, 'deleteAccount'])->name('sitter.account.delete');
    Route::get('/sitter/profile/notification', [SitterProfileController::class, 'notification'])->name('sitter.notification');
    
    // Sitter Picked Jobs
    Route::get('/sitter/picked-jobs-listing', [SitterAdController::class, 'index'])->name('my-job.lists');
    Route::get('/sitter/picked-jobs/{id}/show', [SitterAdController::class, 'show'])->name('my-job.show');

    Route::post('/sitter/ads-listing/apply', [SitterAdController::class, 'apply'])->name('ad.apply');

    // About Pet Owner
    Route::get('/sitter/pet-owner-profile/{id}/show', [SitterAboutController::class, 'show'])->name('pet-owner.about.show');

    // Comments and Reviews on Pet Owner's Profile
    Route::post('/sitter/comment-and-review/store', [SitterReviewController::class, 'store'])->name('pet-owner.review.store');

});
