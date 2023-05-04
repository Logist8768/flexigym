<?php

namespace Modules\User\Actions;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Modules\User\Entities\Client;
use Modules\User\Entities\Coach;
use Modules\User\Entities\Provider;
use Modules\User\Entities\User;
use Modules\User\Exceptions\Authentication\UserException;
use Modules\User\Http\Requests\RegisterRequest;
use Modules\User\Http\Resources\Auth\TokenResource;
use Modules\User\Jobs\CreateQrCode;

class RegisterAction
{
    public function __invoke(RegisterRequest $request): JsonResource
    {
        $user = User::where('phone', $request->phone)
            ->where('profile_completed', false)
            ->first();

        if (empty($user)) {
            throw UserException::userIsAlreadyExist();
        }

        $user->update([
            'uuid' => Str::uuid(),
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'profile_completed' => true,
            'type' => $request->type,
        ]);

        if ($request->type == 0) {
            Client::create([
                'user_id' => $user->id,
                'name' => $request->name,
                'city' => $request->city,
                'age' => $request->age,
                'gender' => $request->gender,
            ]);
        }

        if ($request->type == 1) {
            Provider::create([
                'user_id' => $user->id,
                'name' => $request->name,
                'city' => $request->city,
                'club_name' => $request->club_name,
                'category' => $request->category,
                'address' => $request->address,
            ]);
        }

        if ($request->type == 2) {
            Coach::create([
                'user_id' => $user->id,
                'name' => $request->name,
                'profession' => $request->profession,
                'description' => $request->description,
                'gender' => $request->gender,
            ]);
        }

        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->plainTextToken;
        CreateQrCode::dispatch($user);
        return TokenResource::make($user)->token($token);
    }
}
