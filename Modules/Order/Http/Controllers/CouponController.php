<?php

namespace Modules\Order\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Order\Actions\AddCouponToCartAction;
use Modules\Order\Actions\ResetCouponAction;
use Modules\Order\Http\Requests\AddCouponRequest;
use Modules\User\Http\Requests\ResetCouponRequest;

class CouponController extends Controller
{

    public function addCoupon(AddCouponRequest $request)
    {
        (new AddCouponToCartAction())($request);

        return response()->json([
            'message' => 'Coupon is updated successfully',
            'status' => 200,
        ]);
    }

    public function resetCoupon()
    {
        (new ResetCouponAction())();

        return response()->json([
            'message' => 'Coupon is removed successfully',
            'status' => 200,
        ]);
    }
}
