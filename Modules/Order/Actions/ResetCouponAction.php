<?php

namespace Modules\Order\Actions;

use Illuminate\Support\Facades\DB;
use Modules\Cart\Exceptions\CartException;
use Modules\Cart\Traits\CartTrait;
use Modules\Order\Traits\CouponTrait;
use Modules\User\Http\Requests\ResetCouponRequest;

class ResetCouponAction
{
    use CartTrait, CouponTrait;

    public function __invoke()
    {
        DB::transaction(function () {

            $cart = $this->getAuthenticatedClientCart();

            if (!$cart->coupon_code) {
                throw CartException::cartDoesNotHaveCoupon();
            }

            $this->removeCartDiscount($cart);
        });

    }
}
