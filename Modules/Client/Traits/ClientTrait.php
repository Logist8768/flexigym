<?php

namespace Modules\Client\Traits;

trait ClientTrait
{
    public function getAuthenticatedClient()
    {
        return auth()->user()->client;
    }
}
