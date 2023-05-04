<?php

namespace Modules\Cart\Actions;

use Illuminate\Support\Facades\DB;
use Modules\Cart\Exceptions\CartException;
use Modules\Cart\Http\Requests\AddItemToCartRequest;
use Modules\Cart\Traits\CartTrait;
use Modules\Product\Entities\Product;

class AddToCartAction
{
    use CartTrait;

    public function __invoke(AddItemToCartRequest $request)
    {

        DB::transaction(function () use ($request) {

            $cart = $this->getAuthenticatedClientCart();

            $cartProduct = $cart->products()->where('id', $request->product_id)->exists();

            if ($cartProduct) {
                throw CartException::productIsAlreadyExisted();
            }

            $product = Product::find($request->product_id);

            if ($request->quantity > $product->quantity) {
                throw CartException::cartQuantityIsNotValid();
            }

            //validate product quantity
            if ($product->quantity < 1) {
                throw CartException::productMinimumQuantity();
            }

            (new AddProductToCartAction())($cart, $product, $request->quantity);

        });

    }
}
