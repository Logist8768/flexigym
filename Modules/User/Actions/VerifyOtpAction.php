<?php

namespace Modules\User\Actions;

use Carbon\Carbon;
use Modules\User\Entities\OtpVerification;
use Modules\User\Entities\User;
use Modules\User\Exceptions\Authentication\OtpException;
use Modules\User\Exceptions\Authentication\UserException;

class VerifyOtpAction
{
    public function __invoke($request)
    {
        if (User::where('phone', $request->phone)->exists()) {
            throw UserException::userIsAlreadyExist();
        }

        $verificationCode = OtpVerification::where('phone', $request->phone)
            ->where('code', $request->code)
            ->where('expires_at', '>', Carbon::now())
            ->first();

        if ( ! $verificationCode) {
            throw OtpException::failedToVerifyOtp();
        }

        User::create([
            'phone'             => $request->phone,
            'profile_completed' => false,
            'is_verified'       => true,
        ]);
    }
}
