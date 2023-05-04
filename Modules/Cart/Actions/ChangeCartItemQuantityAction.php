<?php
namespace Modules\Cart\Actions;

use Illuminate\Support\Facades\DB;
use Modules\Cart\Exceptions\CartException;
use Modules\Cart\Http\Requests\ChangeCartItemRequest;
use Modules\Cart\Traits\CartTrait;

class ChangeCartItemQuantityAction
{

    use CartTrait;

    public function __invoke(ChangeCartItemRequest $request)
    {

        return DB::transaction(function () use ($request) {

            $cart = $this->getAuthenticatedClientCart();

            $product = $cart->products()->where('id', $request->product_id)->latest()->first();

            if ($request->quantity > $product->quantity) {
                throw CartException::CartQuantityIsNotValid();
            }

            $productItemData = $this->buildCartProductData($product, $request->quantity);
            $product->pivot->update($productItemData);
            $cart->updateTotals();
            return $product;
        });

    }
}
