<?php

namespace Modules\Cart\Actions;

use Modules\Cart\Enums\CartStatus;
use Modules\Cart\Traits\CartTrait;
use Modules\User\Entities\Cart;

class CartDetailsAction
{
    use CartTrait;

    public function __invoke()
    {
        $client = $this->getAuthenticatedClient();

        return Cart::with(['products', 'client'])->where('client_id', $client->id)
            ->where('status', CartStatus::OPENED)
            ->latest()
            ->first();

        // I will modify this is the future to get the latest ordered cart
    }
}
