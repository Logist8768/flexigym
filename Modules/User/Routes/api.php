<?php

use Illuminate\Support\Facades\Route;
use Modules\User\Http\Controllers\API\AddressController;
use Modules\User\Http\Controllers\AuthController;
use Modules\User\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::prefix('auth')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::post('register', 'register');
        Route::post('login', 'login');

        Route::prefix('otp')->group(function () {
            Route::post('send', 'sendOtp');
            Route::post('verify', 'verifyOtp');
        });
    });
});

Route::middleware('auth:sanctum')->group(function () {
    Route::controller(ProfileController::class)->group(function () {
        Route::put('profile', 'updateProfile');
        Route::put('password/change', 'changePassword');
    });

    Route::resource('addresses', AddressController::class);

});
