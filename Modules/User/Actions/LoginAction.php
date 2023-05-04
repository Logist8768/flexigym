<?php

namespace Modules\User\Actions;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use Modules\User\Exceptions\Authentication\UserException;
use Modules\User\Http\Requests\LoginRequest;
use Modules\User\Http\Resources\Auth\TokenResource;

class LoginAction
{
    public function __invoke(LoginRequest $request): JsonResource
    {
        $phone    = $request->phone;
        $password = $request->password;

        if ( ! Auth::attempt(['phone' => $phone, 'password' => $password])) {
            throw UserException::invalidCredentials();
        }
        if (Auth::attempt(['phone' => $phone, 'password' => $password])) {
            $user = Auth::user();

            $tokenResult = $user->createToken('Personal Access Token');
            $token       = $tokenResult->plainTextToken;

            return TokenResource::make($user)->token($token);
        }
    }
}
