<?php

use Illuminate\Support\Facades\Route;
use Modules\Product\Http\Controllers\API\ProductController;

Route::prefix('products')->middleware('auth:sanctum')->group(function () {
    Route::controller(ProductController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/{product}', 'show');
    });
});
