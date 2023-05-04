<?php

namespace Modules\User\Actions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Modules\User\Http\Requests\ChangePasswordRequest;

class ChangePasswordAction
{   
    public function __invoke(ChangePasswordRequest $request)
    {
        $request->user()->update([
            'password' => Hash::make($request->password)
        ]);
    }
}
