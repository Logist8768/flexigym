<?php

namespace Modules\Order\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'calculation_type',
        'discount_value',
        'coupon_code',
        'usage_limit',
        'starts_at',
        'ends_at',
        'status',
    ];

    protected static function newFactory()
    {
        return \Modules\Order\Database\factories\CouponFactory::new ();
    }
}
