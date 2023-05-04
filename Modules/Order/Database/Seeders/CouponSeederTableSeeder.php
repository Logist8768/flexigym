<?php

namespace Modules\Order\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Modules\Order\Entities\Coupon;

class CouponSeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        Coupon::firstOrCreate([
            'name' => 'flexiapp1',
            'calculation_type' => 'fixed',
            'discount_value' => 200,
            'coupon_code' => 'FLEAPP11',
            'starts_at' => '2023-03-04',
            'ends_at' => '2023-03-05',
            'status' => 1,
            'usage_limit' => 10,
        ]);

        Coupon::firstOrCreate([
            'name' => 'flexiapp2',
            'calculation_type' => 'percentage',
            'discount_value' => 10,
            'coupon_code' => 'FLEAPP22',
            'starts_at' => '2023-03-04',
            'ends_at' => '2023-03-05',
            'status' => 1,
            'usage_limit' => 5,
        ]);

    }
}
