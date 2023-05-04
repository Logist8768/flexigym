<?php

namespace App\Modules\User\Helpers;

function createToken($user)
{
    return response()->json([
        'token'   => $user->createToken($user->name)->plainTextToken,
        'type'    => 'Bearer',
        'message' => __('User login successful'),
    ]);
}
