<?php

use Illuminate\Support\Facades\Route;
use Modules\Order\Http\Controllers\CouponController;

Route::middleware('auth:sanctum')->prefix('cart')->group(function () {
    Route::controller(CouponController::class)->group(function () {
        Route::post('add/coupon', 'addCoupon');
        Route::post('reset/coupon', 'resetCoupon');

    });
});
