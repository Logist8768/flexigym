<?php

use Illuminate\Support\Facades\Route;
use Modules\Coach\Http\Controllers\API\CoachController;
use Modules\Coach\Http\Controllers\API\PostController;

Route::middleware('auth:sanctum')->group(function () {
    Route::resource('posts', PostController::class)->only([
        'store', 'show', 'index',
    ]);

    Route::resource('coaches', CoachController::class)->only([
        'index', 'show',
    ]);

    Route::controller(CoachController::class)->prefix('coach')->group(function () {
        Route::get('subscribers', 'listOfSubscribers');
    });
});
