<?php

namespace Modules\User\Traits;

use Modules\User\Entities\Client;

trait AddressTrait
{

    public function getMainAddressForClient(Client $client)
    {
        return $client->addresses->where('is_default', true)->first();

    }
}
