<?php

namespace Modules\Order\Traits;

use Modules\Order\Entities\Coupon;
use Modules\Order\Entities\Order;
use Modules\Order\Exceptions\CouponException;
use Modules\User\Entities\Cart;

trait CouponTrait
{
    protected function validateCouponForCart(Cart $cart, Coupon $coupon): bool
    {
        if ($cart->coupon_code) {
            throw CouponException::cartHasAlreadyCouponApplied();
        }

        if (!$coupon->status) {
            throw CouponException::couponInNotValid();
        }

        if ($coupon->usage_limit) {

            $couponCount = Order::where('coupon_code', $cart->coupon_code)->count();

            if ($couponCount >= $coupon->usage_limit) {
                throw CouponException::couponLimitNotValid();
            }
        }

        return true;
    }

    protected function addCartDiscount(Cart $cart)
    {
        $coupon = Coupon::where('coupon_code', $cart->coupon_code)->first();

        if ($coupon->calculation_type == 'fixed') {
            $cart->discount = $coupon->discount_value;
            $cart->total -= $coupon->discount_value;
        } else {
            $discountValue = ($cart->subtotal * $coupon->discount_value) / 100;
            $cart->discount = $discountValue;
            $cart->total = ($cart->subtotal - $discountValue);
        }

        $cart->save();
    }

    protected function removeCartDiscount(Cart $cart)
    {
        $coupon = Coupon::where('coupon_code', $cart->coupon_code)->first();

        if ($coupon->calculation_type == 'fixed') {
            $cart->total += $coupon->discount_value;

        } else {
            $discountValue = ($cart->subtotal * $coupon->discount_value) / 100;
            $cart->total = ($cart->subtotal + $discountValue);
        }

        $cart->discount = 0;
        $cart->coupon_code = null;
        $cart->save();
    }

}
