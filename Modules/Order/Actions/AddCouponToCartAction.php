<?php

namespace Modules\Order\Actions;

use Illuminate\Support\Facades\DB;
use Modules\Cart\Traits\CartTrait;
use Modules\Order\Entities\Coupon;
use Modules\Order\Exceptions\CouponException;
use Modules\Order\Http\Requests\AddCouponRequest;
use Modules\Order\Traits\CouponTrait;

class AddCouponToCartAction
{
    use CartTrait, CouponTrait;

    public function __invoke(AddCouponRequest $request)
    {
        DB::transaction(function () use ($request) {

            $cart = $this->getAuthenticatedClientCart();

            $coupon = Coupon::where('coupon_code', $request->coupon_code)->first();

            $this->validateCouponForCart($cart, $coupon);

            $cart->coupon_code = $request->coupon_code;
            $cart->save();

            $this->addCartDiscount($cart);
        });

    }
}
