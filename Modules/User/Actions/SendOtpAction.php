<?php

namespace Modules\User\Actions;

use Carbon\Carbon;
use Modules\User\Entities\OtpVerification;
use Modules\User\Entities\User;
use Modules\User\Exceptions\Authentication\OtpException;
use Modules\User\Exceptions\Authentication\UserException;

class SendOtpAction
{
    public function __invoke($request): void
    {
        if ( ! empty(User::where('phone', $request->phone)->exists())) {
            throw UserException::userDoesNotExist();
        }

        $otp = OtpVerification::where('phone', $request->phone)
            ->where('expires_at', '>', Carbon::now())->exists();
        if ($otp) {
            throw OtpException::OtpCanNotSendTillExpired();
        }
        $code       = rand(111111, 999999);
        $createdOtp = OtpVerification::create(
            [
                'phone'         => $request->phone,
                'code'          => $code,
                'expires_at'    => Carbon::now()->addMinutes(2),
            ]
        );

        if ( ! $createdOtp->wasRecentlyCreated) {
            throw OtpException::failedToSendOtp();
        }
    }
}
