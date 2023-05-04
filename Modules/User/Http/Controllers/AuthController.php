<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\User\Actions\ChangePasswordAction;
use Modules\User\Actions\LoginAction;
use Modules\User\Actions\RegisterAction;
use Modules\User\Actions\SendOtpAction;
use Modules\User\Actions\UpdateUserProfileAction;
use Modules\User\Actions\VerifyOtpAction;
use Modules\User\Http\Requests\ChangePasswordRequest;
use Modules\User\Http\Requests\LoginRequest;
use Modules\User\Http\Requests\RegisterRequest;
use Modules\User\Http\Requests\SendOtpRequest;
use Modules\User\Http\Requests\UpdateProfileRequest;
use Modules\User\Http\Requests\VerifyOtpRequest;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        return (new RegisterAction())($request);
    }

    public function login(LoginRequest $request)
    {
        return (new LoginAction())($request);
    }

    public function sendOtp(SendOtpRequest $request)
    {
        (new SendOtpAction())($request);

        return response()->json([
            'message' => 'OTP sent successfully',
        ], 200);
    }

    public function verifyOtp(VerifyOtpRequest $request)
    {
        (new VerifyOtpAction())($request);

        return response()->json([
            'message' => __('OTP is verified successfully'),
        ], 200);
    }


}
