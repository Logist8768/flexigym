<?php

namespace Modules\Product\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Product\Entities\Category;
use Modules\Product\Entities\Product;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        Product::factory()->count(100)->create()->each(function (Product $product) {

            $categoriesIds = Category::inRandomOrder()->limit(rand(1, 5))->pluck('id')->toArray();
            $product->categories()->attach($categoriesIds);

        });

    }
}
