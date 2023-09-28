<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Site\ContactUsController;
use App\Http\Controllers\Site\ProfileController;
use App\Http\Controllers\Site\TextPageController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
function () {
        
    Auth::routes();
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::middleware('auth')->group(function(){

        Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
        Route::post('profile/update', [ProfileController::class, 'update'])->name('profile.update');
        Route::get('profile/edit-password', [ProfileController::class, 'editPassword'])->name('profile.editPassword');
        Route::post('profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');




        // admin
        Route::get('dashboard', [AdminHomeController::class, 'index'])->name('dashboard.index');
        Route::resource('users', UserController::class);
        Route::resource('banners', BannerController::class);
    });


    Route::get("about-us", [TextPageController::class, 'aboutUs'])->name('about_us.index');
    Route::get("terms-and-condition", [TextPageController::class, 'terms'])->name('terms.index');



    Route::get("contact-us", [ContactUsController::class, 'index'])->name('countact_us.index');
    Route::post("contact-us", [ContactUsController::class, 'store'])->name('countact_us.store');






    
    
});







