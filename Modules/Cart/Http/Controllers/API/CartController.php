<?php

namespace Modules\Cart\Http\Controllers\API;

use Illuminate\Routing\Controller;
use Modules\Cart\Actions\AddToCartAction;
use Modules\Cart\Actions\CartDetailsAction;
use Modules\Cart\Actions\ChangeCartItemQuantityAction;
use Modules\Cart\Actions\RemoveCartItemAction;
use Modules\Cart\Http\Requests\AddItemToCartRequest;
use Modules\Cart\Http\Requests\ChangeCartItemRequest;
use Modules\Cart\Http\Requests\RemoveItemCartRequest;
use Modules\Cart\Transformers\CartResource;

class CartController extends Controller
{
    public function addToCart(AddItemToCartRequest $request)
    {
         (new AddToCartAction())($request);

        return response()->json([
            'message' => 'product is added to cart successfully',
            'status_code' => 200,
        ]);

    }

    public function removeItem(RemoveItemCartRequest $request)
    {
        (new RemoveCartItemAction())($request->product_id);

        return response()->json([
            'message' => 'product is removed successfully',
            'status_code' => 200,
        ]);
    }

    public function updateItemQuantity(ChangeCartItemRequest $request)
    {
        $product = (new ChangeCartItemQuantityAction())($request);

        return response()->json([
            'message' => 'product quantity is updated successfully ',
            'status_code' => 200,
            'product' => $product,
        ]);
    }

    public function cartDetails()
    {
        $cart = (new CartDetailsAction())();

        return CartResource::make($cart);
    }
}
