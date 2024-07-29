<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetOwner\PetOwnerAdController;
use App\Http\Controllers\PetOwner\PetOwnerReviewController;
use App\Http\Controllers\PetOwner\PetOwnerProfileController;
use App\Http\Controllers\PetOwner\PetOwnerAboutController;
use App\Http\Controllers\PetOwner\RepublishAdController;

/*
|--------------------------------------------------------------------------
| Front Routes (Pet Owner as User)
|--------------------------------------------------------------------------
|
| Here is where you can register Pet Owner routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['auth', 'pet-owner'])->group(function () {

    // Pet Owner Profile
    Route::get('/profile', [PetOwnerProfileController::class, 'index'])->name('profile');
    Route::get('/profile/{id}/edit', [PetOwnerProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile/{user}/delete', [PetOwnerProfileController::class, 'delete'])->name('pet-owner.profile.delete');
    Route::put('/profile/update', [PetOwnerProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/{id}/change-password', [PetOwnerProfileController::class, 'changePassword'])->name('profile.password.change');
    Route::post('/profile/update-password', [PetOwnerProfileController::class, 'updatePassword'])->name('profile.password.update');
    Route::post('/profile/delete-account/{id}', [PetOwnerProfileController::class, 'deleteAccount'])->name('profile.account.delete');
    Route::get('/profile/notification', [PetOwnerProfileController::class, 'notification'])->name('profile.notification');
    // Document Upload
    Route::post('/profile/document-upload', [PetOwnerProfileController::class, 'upload'])->name('owner.doc-upload');

    // User Ads
    Route::get('/my-ads-listing', [PetOwnerAdController::class, 'index'])->name('my-ad.lists');
    Route::get('/my-ads/{id}/show', [PetOwnerAdController::class, 'show'])->name('my-ad.show');
    Route::get('/create-ads-new', [PetOwnerAdController::class, 'create'])->name('ad.create');
    Route::post('/my-ads/store', [PetOwnerAdController::class, 'store'])->name('ad.store');
    Route::get('/my-ads/edit/{id}', [PetOwnerAdController::class, 'edit'])->name('ad.edit');
    Route::post('/my-ads/update', [PetOwnerAdController::class, 'update'])->name('ad.update');

    // Republish Ad:
    Route::post('/my-ads/{id}/re-publish', [RepublishAdController::class, 'republishAd'])->name('adRepublish');

    // About User
    Route::get('/about-sitter/{id}/show', [PetOwnerAboutController::class, 'show'])->name('sitter.about.show');

    // Comments and Reviews on Sitter's Profile
    Route::post('/comment-and-review/store', [PetOwnerReviewController::class, 'store'])->name('sitter.review.store');


});

