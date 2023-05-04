<?php

namespace Modules\User\Exceptions\Authentication;

class UserException extends \Exception
{
    // fleet intellj

    public static function userNotFound(): self
    {
        return new self(
            'User not found.',
            400
        );
    }

    public static function userDoesNotExist(): self
    {
        return new self(
            'User is already exist.',
            422
        );
    }

    public static function userIsAlreadyExist(): self
    {
        return new self(
            'User is already exist',
            422
        );
    }

    public static function invalidCredentials(): self
    {
        return new self(
            'Invalid credentials',
            401
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
