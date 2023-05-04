<?php

use Illuminate\Support\Facades\Route;
use Modules\Chat\Http\Controllers\API\ChatController;
use Modules\Chat\Http\Controllers\API\MessageController;

Route::middleware('auth:sanctum')->group(function () {
    Route::resource('chats', ChatController::class)->only([
        'index', 'show',
    ]);

    Route::resource('chats.messages', MessageController::class)->only([
        'index', 'store',
    ]);

});

//api/chats Done
//api/chats/{chat} Done
//api/chats/{chat}/messages
//api/chats/{chat}/messages
//api/chats/{chat}/participants
