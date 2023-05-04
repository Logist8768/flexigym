<?php

namespace Modules\User\Actions\Addresses;

use Modules\Cart\Traits\CartTrait;

class DeleteAddressAction
{
    use CartTrait;

    public function __invoke($address)
    {
        $client = $this->getAuthenticatedClient();

        $address = $client->addresses()->findOrFail($address->id);

        $address->delete();
    }
}
