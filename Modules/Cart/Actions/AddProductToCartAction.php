<?php

namespace Modules\Cart\Actions;

use Modules\User\Entities\Cart;

class AddProductToCartAction
{
    public function __invoke(Cart $cart, $product, $quantity)
    {
        $subtotal = ($product->price * $quantity);
        $vat = calcVat($subtotal);
        $total = $subtotal + $vat;

        $productItemData = array(
            'product_id' => $product->id,
            'price' => $product->price,
            'quantity' => $quantity,
            'subtotal' => $subtotal,
            'discount' => 0,
            'vat' => $vat,
            'total' => $total,
            'cart_id' => $cart->id,
        );

        $cart->products()->attach([$productItemData]);
        $cart->updateTotals();
    }
}
