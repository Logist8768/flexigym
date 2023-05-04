<?php

namespace Modules\User\Actions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\User\Entities\Client;
use Modules\User\Http\Requests\UpdateProfileRequest;
use Modules\User\Transformers\UserProfileResource;

class UpdateUserProfileAction
{
    public function __invoke(UpdateProfileRequest $request)
    {
        DB::transaction(function () use ($request) {

           $request->user()->update($request->validated());

           $request->user()->client->update($request->all());

        });

    }
}
