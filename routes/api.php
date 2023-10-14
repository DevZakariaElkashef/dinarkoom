<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ContactUsController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\RelativeController;
use App\Http\Controllers\Api\RelativeTypeController;
use App\Http\Controllers\Api\TextPageController;
use App\Http\Controllers\Api\WinnersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('home', [HomeController::class, 'index']);


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::post('send-code', [AuthController::class, 'sendCode']);
Route::post('code-check', [AuthController::class, 'codeCheck']);

Route::get('about-us', [TextPageController::class, 'aboutUs']);
Route::get('terms-and-conditions', [TextPageController::class, 'terms']);

Route::get('winners', [WinnersController::class, 'index']);

Route::post('make-orders', [OrderController::class, 'store']);

Route::get('relative-types', [RelativeTypeController::class, 'index']);

Route::post('contact-us', [ContactUsController::class, 'store']);


Route::middleware('auth:sanctum')->group(function(){
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('update-password', [AuthController::class, 'updatePassword']);
    
    Route::get('my-profile', [ProfileController::class, 'index']);
    Route::post('update-profile', [ProfileController::class, 'update']);
    Route::post('change-password', [ProfileController::class, 'changePassword']);

    Route::get('my-relatives', [RelativeController::class, 'index']);
    Route::post('add-relatives', [RelativeController::class, 'store']);

    Route::get('my-orders', [OrderController::class, 'index']);
    
});
