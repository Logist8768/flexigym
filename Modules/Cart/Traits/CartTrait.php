<?php

namespace Modules\Cart\Traits;

use Modules\Cart\Enums\CartStatus;
use Modules\Product\Entities\Product;
use Modules\User\Entities\Cart;

trait CartTrait
{

    public function getAuthenticatedClient()
    {
        return auth()->user()->client;
    }

    public function getAuthenticatedClientCart()
    {
        $client = $this->getAuthenticatedClient();

        $cart = Cart::where('client_id', $client->id)
            ->where('status', CartStatus::OPENED)
            ->latest()->first();

        if (!$cart) {
            return Cart::Create(['client_id' => $client->id]);
        }

        return $cart;
    }

    public function buildCartProductData(Product $product, int $quantity): array
    {
        $subtotal = ($product->price * $quantity);
        $vat = calcVat($subtotal);
        $total = $subtotal + $vat;

        return [
            'product_id' => $product->id,
            'price' => $product->price,
            'quantity' => $quantity,
            'subtotal' => $subtotal,
            'discount' => 0,
            'vat' => $vat,
            'total' => $total,
        ];
    }
}
