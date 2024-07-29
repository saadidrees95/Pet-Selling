<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Public\AdController;
use App\Http\Controllers\Public\SubscriberController;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\AboutController;
use App\Http\Controllers\Public\SearchController;
use App\Http\Controllers\Public\ContactController;
use App\Http\Controllers\Public\LandingController;
use App\Http\Controllers\Public\PackageController;
use App\Http\Controllers\Public\ServiceController;
use App\Http\Controllers\Public\WelcomeController;
use App\Http\Controllers\Public\PetSitterController;
use App\Http\Controllers\Public\PreSignupController;
use App\Http\Controllers\Public\HouseSitterController;
use App\Http\Controllers\Public\PrivacyPolicyController;
use App\Http\Controllers\Public\TermsAndConditionsController;


/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your frontend application.
| These routes are loaded by the RouteServiceProvider and assigned to the 
| "web" middleware group.
|
*/


// Basic Pages
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::get('/landing', [LandingController::class, 'index'])->name('landing');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/contact-us', [ContactController::class, 'index'])->name('contact');
Route::post('/contact-us', [ContactController::class, 'send'])->name('contact.submit');
Route::get('/services', [ServiceController::class, 'index'])->name('services');
Route::view('/faqs', 'web.page.faqs')->name('faqs');

// Service Details    
Route::get('/services/day-cation', [ServiceController::class, 'dayCation'])->name('day-cation');
Route::get('/services/cat-cation', [ServiceController::class, 'catCation'])->name('cat-cation');
Route::get('/services/dog-cation', [ServiceController::class, 'dogCation'])->name('dog-cation');
Route::get('/services/stay-cation', [ServiceController::class, 'stayCation'])->name('stay-cation');
Route::get('/services/house-sitting', [ServiceController::class, 'houseSitting'])->name('house-sitting');
Route::get('/services/drop_and_visit', [ServiceController::class, 'dropAndVisit'])->name('drop-and-visit');

// Ad listing
Route::get('/ad-listing', [AdController::class, 'index'])->name('ad.lists');
Route::get('/ad-listing/{id}/show', [AdController::class, 'show'])->name('ad.show');
Route::get('/filter-ads', [AdController::class, 'filterAds'])->name('ad.filter');

// Pet Sitter
Route::get('/pet-sitter', [PetSitterController::class, 'index'])->name('pet-sitter');
Route::get('/pet-sitter/show/{id}', [PetSitterController::class, 'show'])->name('pet-sitter.show');

// House Sitter
Route::get('/house-sitter', [HouseSitterController::class, 'index'])->name('house-sitter');
Route::get('/house-sitter/show/{id}', [HouseSitterController::class, 'show'])->name('house-sitter.show');

// Search
// Route::get('/search', [SearchController::class, 'index'])->name('search');
// Route::get('/search/ads-listing', [SearchController::class, 'adsListing'])->name('search.ad-listing');
// Route::get('/search/pet-sitter', [SearchController::class, 'petSitter'])->name('search.pet-sitter');
// Route::get('/search/house-sitter', [SearchController::class, 'houseSitter'])->name('search.house-sitter');

// Package
Route::get('/package-listing', [PackageController::class, 'index'])->name('package.lists');

// Pre Signup 
Route::get('/select-your-role', [PreSignupController::class, 'index'])->name('pre-signup');

// Newsletter Subscriber
Route::post('/subscribe-for-news-letter', [SubscriberController::class, 'subscribeNow'])->name('subscribeNow');

// Other Pages
Route::get('/terms-and-conditions', [TermsAndConditionsController::class, 'index'])->name('terms.conditions');
Route::get('/privacy-and-policy', [PrivacyPolicyController::class, 'index'])->name('privacy.policy');
