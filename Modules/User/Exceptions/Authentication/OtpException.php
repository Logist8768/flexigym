<?php

namespace Modules\User\Exceptions\Authentication;

class OtpException extends \Exception
{
    public static function failedToSendOtp(): self
    {
        return new self(
            'Failed to send OTP.',
            400
        );
    }

    public static function phoneIsAlreadyExist(): self
    {
        return new self(
            'Phone number is already exist',
            422
        );
    }

    public static function OtpCanNotSendTillExpired(): self
    {
        return new self(
            'OTP is not sent until it is expired',
            400
        );
    }

    public static function failedToVerifyOtp(): self
    {
        return new self(
            'Failed to verify OTP.',
            400
        );
    }

    public function render()
    {
        return response()->json([
            'message' => $this->getMessage(),
            'code'    => $this->getCode(),
        ], $this->getCode());
    }
}
