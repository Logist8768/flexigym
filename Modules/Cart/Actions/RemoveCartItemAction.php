<?php

namespace Modules\Cart\Actions;

use Illuminate\Support\Facades\DB;
use Modules\Cart\Exceptions\CartException;
use Modules\Cart\Traits\CartTrait;

class RemoveCartItemAction
{
    use CartTrait;

    public function __invoke($item)
    {
        DB::transaction(function () use ($item) {
            $cart = $this->getAuthenticatedClientCart();

            $cartProduct = $cart->products()->where('id', $item)->latest()->first();

            if (!$cartProduct) {
                throw CartException::productNotFoundInCart();
            }

            $cart->products()->detach($cartProduct->id);
            $cart->updateTotals();

            if ($cart->products()->count() == 0) {
                $cart->delete();
            }
        });

    }
}
