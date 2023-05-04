<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts_products', function (Blueprint $table) {
            $table->foreignId('cart_id')->constrained();
            $table->index('cart_id');
            $table->foreignId('product_id')->constrained();
            $table->index('product_id');
            $table->primary(['product_id', 'cart_id']);
            $table->float('price');
            $table->integer('quantity');
            $table->float('total');
            $table->float('subtotal');
            $table->float('vat');
            $table->float('discount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts_products');
    }
};
