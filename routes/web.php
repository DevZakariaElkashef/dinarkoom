<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Admin\RelativeController as AdminRelativeController;
use App\Http\Controllers\Admin\RelativeTypeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TextPageController as AdminTextPageController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WinnerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Site\ContactUsController;
use App\Http\Controllers\Site\GuestController;
use App\Http\Controllers\Site\InvoiceController;
use App\Http\Controllers\Site\OrderController;
use App\Http\Controllers\Site\ProfileController;
use App\Http\Controllers\Site\RelativeController;
use App\Http\Controllers\Site\TextPageController;
use App\Http\Controllers\Site\WinnerController as SiteWinnerController;
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


        Route::get('guest/register', [GuestController::class, 'register'])->name('guest.register');
        Route::post('guest/register', [GuestController::class, 'store'])->name('guest.store');


        Route::middleware(['auth', 'verified'])->group(function () {

            Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
            Route::post('profile/update', [ProfileController::class, 'update'])->name('profile.update');
            Route::get('profile/edit-password', [ProfileController::class, 'editPassword'])->name('profile.editPassword');
            Route::post('profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');
            Route::resource('relatives', RelativeController::class);
            Route::get('invice/{id}', [InvoiceController::class, 'index'])->name('invoice.pdf');

            // admin
            Route::prefix('admin')->group(function () {

                Route::get('dashboard', [AdminHomeController::class, 'index'])->name('dashboard.index');
                Route::resource('users', UserController::class);
                Route::get('users-excel', [UserController::class, 'exportExcel'])->name('users.export_excel');
                Route::get('users-pdf', [UserController::class, 'exportPdf'])->name('users.export_pdf');
                Route::get('user-search', [UserController::class, 'search'])->name('users.serach');
                Route::resource('banners', BannerController::class);
                Route::resource('images', ImageController::class);
                Route::resource('contacts', ContactController::class);
                Route::resource('settings', SettingController::class);
                Route::resource('admin-relatives', AdminRelativeController::class);
                Route::get('admin-relatives-excel', [AdminRelativeController::class, 'exportExcel'])->name('admin-relatives.export_excel');
                Route::get('admin-relatives-pdf', [AdminRelativeController::class, 'exportPdf'])->name('admin-relatives.export_pdf');
                Route::get('admin-relatives-search', [AdminRelativeController::class, 'search'])->name('admin-relatives.serach');
                Route::resource('relative-types', RelativeTypeController::class);
                Route::resource('roles', RoleController::class);
                Route::resource('winners', WinnerController::class);
                Route::get('winners-active/{id}', [WinnerController::class, 'active'])->name('winners.active');
                Route::get('winners-excel', [WinnerController::class, 'exportExcel'])->name('winners.export_excel');
                Route::get('winners-pdf', [WinnerController::class, 'exportPdf'])->name('winners.export_pdf');
                Route::get('winners-search', [WinnerController::class, 'search'])->name('winners.serach');
                

                Route::get('images-active\{id}', [ImageController::class, 'active'])->name('images.active');
                Route::get('images-deactive\{id}', [ImageController::class, 'deactive'])->name('images.deactive');
                Route::get('page/about-us', [AdminTextPageController::class, 'aboutIndex'])->name('about-us.index');
                Route::post('page/about-us', [AdminTextPageController::class, 'aboutStore'])->name('about-us.store');
                Route::get('page/terms', [AdminTextPageController::class, 'termsIndex'])->name('page.terms.index');
                Route::post('page/terms', [AdminTextPageController::class, 'termsStore'])->name('page.terms.store');
                Route::get('profile', [AdminProfileController::class, 'index'])->name('admin-profile.index');
                Route::put('profile', [AdminProfileController::class, 'update'])->name('admin-profile.update');
                Route::get('orders', [AdminOrderController::class, 'index'])->name('orders.index');
                Route::get('orders-excel', [AdminOrderController::class, 'exportExcel'])->name('orders.export_excel');
                Route::get('orders-pdf', [AdminOrderController::class, 'exportPdf'])->name('orders.export_pdf');
                Route::delete('orders/{id}', [AdminOrderController::class, 'destroy'])->name('orders.destroy');
                Route::put('orders/{id}', [AdminOrderController::class, 'update'])->name('orders.update');
                Route::get('orders-search', [AdminOrderController::class, 'search'])->name('orders.serach');
                Route::get('notifications', [NotificationController::class, 'index'])->name('notification.index');
                Route::get('notifications/send', [NotificationController::class, 'create'])->name('notification.create');
                Route::post('notifications/send', [NotificationController::class, 'store'])->name('notification.store');
                Route::delete('notifications/{id}', [NotificationController::class, 'destroy'])->name('notification.destroy');
            });
        });


        Route::get("about-us", [TextPageController::class, 'aboutUs'])->name('about_us.index');
        Route::get("terms-and-condition", [TextPageController::class, 'terms'])->name('terms.index');



        Route::get("contact-us", [ContactUsController::class, 'index'])->name('countact_us.index');
        Route::post("contact-us", [ContactUsController::class, 'store'])->name('countact_us.store');

        Route::get('my-orders', [OrderController::class, 'index'])->name('order.index');
        Route::post('order/store', [OrderController::class, 'store'])->name('order.store');
        Route::get('winners', [SiteWinnerController::class, 'index'])->name('winner.index');


        Route::view('won', 'mail.winner');
    }
);
