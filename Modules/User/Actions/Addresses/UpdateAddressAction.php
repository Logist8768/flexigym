<?php

namespace Modules\User\Actions\Addresses;

use Modules\Cart\Traits\CartTrait;
use Modules\User\Http\Requests\UpdateAddressRequest;
use Modules\User\Http\Resources\AddressResource;
use Modules\User\Traits\AddressTrait;

class UpdateAddressAction
{
    use AddressTrait, CartTrait;

    public function __invoke(UpdateAddressRequest $request, $addressId)
    {
        //
        $client = $this->getAuthenticatedClient();

        $address = $client->addresses()->findOrFail($addressId);

        $mainAddress = $this->getMainAddressForClient($client);

        if ($request->is_default == true && $mainAddress) {
            $mainAddress->update(['is_default' => false]);
        }

        $address->update($request->validated());

        return AddressResource::make($address->refresh());

    }
}
