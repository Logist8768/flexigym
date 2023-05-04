<?php

use Illuminate\Support\Facades\Route;
use Modules\Cart\Http\Controllers\API\CartController;

Route::middleware('auth:sanctum')->group(function () {
    Route::controller(CartController::class)->group(function () {
        Route::post('add/item', 'addToCart');
        Route::post('remove/item', 'removeItem');
        Route::post('change/quantity', 'updateItemQuantity');
        Route::get('details', 'cartDetails');
    });
});
