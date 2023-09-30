<?php

use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\TextPageController as AdminTextPageController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Site\ContactUsController;
use App\Http\Controllers\Site\ProfileController;
use App\Http\Controllers\Site\TextPageController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
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
   
    Route::get('/email/verify', function () {
        return view('site.auth.verify');
    })->middleware('auth')->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
     
        return redirect('/');
    })->middleware(['auth', 'signed'])->name('verification.verify');

    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
     
        return back()->with('message', 'Verification link sent!');
    })->middleware(['auth', 'throttle:6,1'])->name('verification.send');


    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::middleware(['auth', 'verified'])->group(function(){

        Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
        Route::post('profile/update', [ProfileController::class, 'update'])->name('profile.update');
        Route::get('profile/edit-password', [ProfileController::class, 'editPassword'])->name('profile.editPassword');
        Route::post('profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');




        // admin
        Route::prefix('admin')->group(function(){

            Route::get('dashboard', [AdminHomeController::class, 'index'])->name('dashboard.index');
            Route::resource('users', UserController::class);
            Route::resource('banners', BannerController::class);
            Route::resource('images', ImageController::class);
            Route::get('images-active\{id}', [ImageController::class, 'active'])->name('images.active');
            Route::get('images-deactive\{id}', [ImageController::class, 'deactive'])->name('images.deactive');
            Route::get('page/about-us', [AdminTextPageController::class, 'aboutIndex'])->name('about-us.index');
            Route::post('page/about-us', [AdminTextPageController::class, 'aboutStore'])->name('about-us.store');
            Route::get('page/terms', [AdminTextPageController::class, 'termsIndex'])->name('page.terms.index');
            Route::post('page/terms', [AdminTextPageController::class, 'termsStore'])->name('page.terms.store');
            Route::resource('contacts', ContactController::class);
        });
    });


    Route::get("about-us", [TextPageController::class, 'aboutUs'])->name('about_us.index');
    Route::get("terms-and-condition", [TextPageController::class, 'terms'])->name('terms.index');



    Route::get("contact-us", [ContactUsController::class, 'index'])->name('countact_us.index');
    Route::post("contact-us", [ContactUsController::class, 'store'])->name('countact_us.store');






    
    
});







