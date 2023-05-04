<?php

namespace Modules\User\Actions\Addresses;

use Modules\User\Entities\Client;
use Modules\User\Http\Requests\CreateAddressRequest;
use Modules\User\Traits\AddressTrait;

class CreateAddressAction
{
    use AddressTrait;

    public function __invoke(CreateAddressRequest $request, Client $client)
    {
        $mainAddress = $this->getMainAddressForClient($client);

        if ($request->is_default == true && $mainAddress) {
            $mainAddress->update(['is_default' => false]);
        }

        return $client->addresses()->create($request->validated());
    }
}
