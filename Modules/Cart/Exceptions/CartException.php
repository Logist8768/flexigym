<?php

namespace Modules\Cart\Exceptions;

class CartException extends \Exception

{

    public static function productIsAlreadyExisted(): self
    {
        return new self(
            'Product is already existed in your cart',
            422
        );
    }

    public static function productMinimumQuantity(): self
    {
        return new self(
            'You must add one quantity at least of the product',
            400
        );
    }

    public static function cartQuantityIsNotValid(): self
    {
        return new self(
            'The quantity in cart is not valid',
            400
        );
    }

    public static function productNotFound(): self
    {
        return new self(
            'Product not found',
            404
        );
    }

    public static function productNotFoundInCart(): self
    {
        return new self(
            'Product not found In Cart',
            404
        );
    }

    public static function productIsTheSameQuantity(): self
    {
        return new self(
            'Product item is already the same quantity',
            400

        );
    }

    public static function cartDoesNotHaveCoupon(): self
    {
        return new self(
            'Cart does not have coupon applied',
            400

        );
    }

    public function render()
    {
        return response()->json([
            'message' => $this->getMessage(),
            'code' => $this->getCode(),
        ], $this->getCode());
    }

}
