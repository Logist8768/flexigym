<?php

namespace Modules\User\Actions\Addresses;

use Modules\User\Http\Resources\AddressCollection;

class ListAddressAction
{

    public function __invoke($client)
    {
        $addresses = $client->addresses;
        return AddressCollection::make($addresses);
    }
}
