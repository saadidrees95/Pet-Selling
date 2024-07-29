<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAdController;
use App\Http\Controllers\Admin\AdminPetsController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminLeadsController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminSitterController;
use App\Http\Controllers\Admin\AdminCreditsController;
use App\Http\Controllers\Admin\AdminPackageController;
use App\Http\Controllers\Admin\AdminServiceController;
use App\Http\Controllers\Admin\AdminPetOwnerController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminSitterJobController;
use App\Http\Controllers\Admin\AdminSubscriberController;
use App\Http\Controllers\Admin\AdminBuyerReviewController;
use App\Http\Controllers\Admin\AdminSellerReviewController;
use App\Http\Controllers\Admin\AdminSettingController;



/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::middleware(['auth', 'admin'])->group(function () {

    // Dashboard
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    //setting
    Route::get('/admin/setting', [AdminSettingController::class, 'create'])->name('admin.setting');
    Route::post('/admin/setting/update', [AdminSettingController::class, 'update'])->name('admin.setting.update');

    // Services List
    Route::get('/admin/services/day-cation-lists', [AdminServiceController::class, 'dayCation'])->name('admin.dayCation.lists');
    Route::get('/admin/services/cat-cation-lists', [AdminServiceController::class, 'catCation'])->name('admin.catCation.lists');
    Route::get('/admin/services/stay-cation-lists', [AdminServiceController::class, 'stayCation'])->name('admin.stayCation.lists');
    Route::get('/admin/services/dog-cation-lists', [AdminServiceController::class, 'dogCation'])->name('admin.dogCation.lists');
    Route::get('/admin/services/drop-&-visit-lists', [AdminServiceController::class, 'dropAndVisit'])->name('admin.dropAndVisit.lists');
    Route::get('/admin/services/house-sitting-lists', [AdminServiceController::class, 'houseSitting'])->name('admin.houseSitting.lists');

    // Service Resource
    Route::get('/admin/services/service-lists', [AdminServiceController::class, 'index'])->name('admin.service.lists');
    Route::get('/admin/services/create-new-service', [AdminServiceController::class, 'create'])->name('admin.service.form');
    Route::post('/admin/services/create-new-service', [AdminServiceController::class, 'store'])->name('admin.service');
    Route::get('/admin/services/{id}/show', [AdminServiceController::class, 'show'])->name('admin.service.show');
    Route::get('/admin/services/{id}/edit', [AdminServiceController::class, 'edit'])->name('admin.service.edit');
    Route::put('/admin/services/update', [AdminServiceController::class, 'update'])->name('admin.service.update');
    Route::get('/admin/services/{id}/delete', [AdminServiceController::class, 'destroy'])->name('admin.service.destroy');

    // Packages
    Route::get('/admin/packages/package-lists', [AdminPackageController::class, 'index'])->name('admin.package.lists');
    Route::get('/admin/packages/create-new-package', [AdminPackageController::class, 'create'])->name('admin.package.form');
    Route::post('/admin/packages/create-new-package', [AdminPackageController::class, 'store'])->name('admin.package');
    Route::get('/admin/packages/{id}/show', [AdminPackageController::class, 'show'])->name('admin.package.show');
    Route::get('/admin/packages/{id}/edit', [AdminPackageController::class, 'edit'])->name('admin.package.edit');
    Route::put('/admin/packages/update', [AdminPackageController::class, 'update'])->name('admin.package.update');
    Route::get('/admin/packages/{id}/delete', [AdminPackageController::class, 'destroy'])->name('admin.package.destroy');

    // Pet Owners
    Route::get('/admin/pet-owners/pet-owner-lists', [AdminPetOwnerController::class, 'index'])->name('admin.pet-owner.lists');
    Route::get('/admin/pet-owners/{id}/show', [AdminPetOwnerController::class, 'show'])->name('admin.pet-owner.show');
    Route::get('/admin/pet-owners/{id}/edit', [AdminPetOwnerController::class, 'edit'])->name('admin.pet-owner.edit');
    Route::put('/admin/pet-owners/update', [AdminPetOwnerController::class, 'update'])->name('admin.pet-owner.update');
    Route::get('/admin/pet-owners/{id}/delete', [AdminPetOwnerController::class, 'destroy'])->name('admin.pet-owner.destroy');
    Route::get('/export-pet-owners', [AdminPetOwnerController::class, 'exportPetOwners'])->name('export.pet-owners');

    // Pets
    Route::get('/admin/pets/pet-lists', [AdminPetsController::class, 'index'])->name('admin.pet.lists');
    Route::get('/admin/pets/{id}/delete', [AdminPetsController::class, 'destroy'])->name('admin.pet.destroy');

    // Ads
    Route::get('/admin/ads/ad-lists', [AdminAdController::class, 'index'])->name('admin.ad.lists');
    Route::get('/admin/ads/{id}/show', [AdminAdController::class, 'show'])->name('admin.ad.show');
    Route::get('/admin/ads/{id}/edit', [AdminAdController::class, 'edit'])->name('admin.ad.edit');
    Route::put('/admin/ads/update', [AdminAdController::class, 'update'])->name('admin.ad.update');
    Route::get('/admin/ads/{id}/delete', [AdminAdController::class, 'destroy'])->name('admin.ad.delete');

    // Republish Ad:
    Route::post('/admin/ads/{id}/re-publish', [AdminAdController::class, 'republishAd'])->name('admin.adRepublish');

    // Sitters
    Route::get('/admin/sitters/sitter-lists', [AdminSitterController::class, 'index'])->name('admin.sitter.lists');
    Route::get('/admin/sitters/{id}/show', [AdminSitterController::class, 'show'])->name('admin.sitter.show');
    Route::get('/admin/sitters/{id}/edit', [AdminSitterController::class, 'edit'])->name('admin.sitter.edit');
    Route::put('/admin/sitters/update', [AdminSitterController::class, 'update'])->name('admin.sitter.update');
    Route::get('/admin/sitters/{id}/delete', [AdminSitterController::class, 'destroy'])->name('admin.sitter.destroy');
    Route::get('/export-sitters', [AdminSitterController::class, 'exportSitters'])->name('export.sitters');

    // Pet Owner Reviews
    Route::get('/admin/reviews/pet-owner-reviews-lists', [AdminBuyerReviewController::class, 'index'])->name('admin.owner-review.lists');
    Route::get('/admin/reviews/pet-owner-review/{id}/delete', [AdminBuyerReviewController::class, 'destroy'])->name('admin.owner-review.destroy');

    // Sitter Reviews
    Route::get('/admin/sitter-reviews-lists', [AdminSellerReviewController::class, 'index'])->name('admin.sitter-review.lists');
    Route::get('/admin/reviews/sitter-review/{id}/delete', [AdminSellerReviewController::class, 'destroy'])->name('admin.sitter-review.destroy');

    // Jobs
    Route::get('/admin/sitter/job-lists', [AdminSitterJobController::class, 'index'])->name('admin.sitter-job.lists');

    // Orders
    Route::get('/admin/orders/order-lists', [AdminOrderController::class, 'index'])->name('admin.order.lists');
    Route::get('/export-orders', [AdminOrderController::class, 'exportOrders'])->name('export.orders');

    // Credits
    Route::get('/admin/credits/credit-lists', [AdminCreditsController::class, 'index'])->name('admin.credit.lists');
    Route::get('/admin/credits/credit-balance', [AdminCreditsController::class, 'creditBalance'])->name('admin.credit.balance');
    Route::get('/admin/credits/{id}/delete', [AdminCreditsController::class, 'destroy'])->name('admin.credit.destroy');

    // Subscriber
    Route::get('/admin/subscribers/subscriber-lists', [AdminSubscriberController::class, 'index'])->name('admin.subscriber.lists');
    Route::get('/admin/subscribers/{id}/delete', [AdminSubscriberController::class, 'destroy'])->name('admin.subscriber.destroy');

    // Users
    Route::get('/admin/users/user-lists', [AdminUserController::class, 'index'])->name('admin.user.lists');
    Route::get('/admin/users/create-new-user', [AdminUserController::class, 'create'])->name('admin.user.form');
    Route::post('/admin/users/order-new-user', [AdminUserController::class, 'store'])->name('admin.user');
    Route::get('/admin/users/{id}/show', [AdminUserController::class, 'show'])->name('admin.user.show');
    Route::get('/admin/users/{id}/edit', [AdminUserController::class, 'edit'])->name('admin.user.edit');
    Route::put('/admin/users/update', [AdminUserController::class, 'update'])->name('admin.user.update');
    Route::get('/admin/users/{id}/delete', [AdminUserController::class, 'destroy'])->name('admin.user.destroy');

    // Setting
    Route::get('/admin/settings/email-configuration', [AdminSettingsController::class, 'create'])->name('admin.email-setting.form');
    Route::get('/admin/settings/email-configuration', [AdminSettingsController::class, 'store'])->name('admin.email-setting');

});
