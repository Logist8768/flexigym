<?php

namespace Modules\Order\Exceptions;

class CouponException extends \Exception

{
    public static function cartHasAlreadyCouponApplied(): self
    {
        return new self(
            'Cart has already coupon applied',
            400
        );
    }

    public static function couponInNotValid(): self
    {
        return new self(
            'Coupon is not valid',
            400
        );
    }

    public static function couponLimitNotValid(): self
    {
        return new self(
            'Coupon limit get reached',
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
