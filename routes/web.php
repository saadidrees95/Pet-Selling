<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FallbackController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });



// includes routes for auth
require __DIR__ . '/auth.php';

// includes routes for public pages
require __DIR__ . '/public.php';

// includes routes for pet-owner
require __DIR__ . '/pet_owner.php';

// includes routes for buyer
require __DIR__ . '/sitter.php';

// includes routes for admin
require __DIR__ . '/admin.php';



// Fallback route to handle all "not found" URLs
Route::fallback([FallbackController::class, 'handle']);
/*The fallback route should always be the last route registered by your application*/  
