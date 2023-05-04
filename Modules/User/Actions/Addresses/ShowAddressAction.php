<?php

namespace Modules\User\Actions\Addresses;

use Modules\User\Entities\Address;

class ShowAddressAction
{
    public function __invoke($address)
    {
        return Address::findOrFail($address->id);
    }
}
