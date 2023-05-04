<?php

namespace Modules\User\Http\Controllers;


use Illuminate\Routing\Controller;
use Modules\User\Actions\ChangePasswordAction;
use Modules\User\Actions\UpdateUserProfileAction;
use Modules\User\Http\Requests\ChangePasswordRequest;
use Modules\User\Http\Requests\UpdateProfileRequest;

class ProfileController extends Controller
{
    public function updateProfile(UpdateProfileRequest $request)
    {
         (new UpdateUserProfileAction())($request);

         return response()->json([
            'message' => __('Profile is updated successfully'),
        ], 200);

    }

    public function changePassword(ChangePasswordRequest $request)
    {
        (new ChangePasswordAction())($request);

        return response()->json([
            'message' => __('Password is changed successfully'),
        ], 200);
    }
}
