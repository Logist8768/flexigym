<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\User\Entities\Address;
use Modules\User\Entities\Client;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Client::class);
            $table->foreignIdFor(Address::class, 'shipping_address_id');
            $table->foreignId('payment_method_id')->nullable();
            $table->enum('payment_status', ['pending', 'paid', 'cancled']);
            $table->string('status')->nullable();
            $table->float('subtotal');
            $table->float('fees');
            $table->float('vat')->default(0);
            $table->float('total');
            $table->float('discount')->default(0);
            $table->string('coupon_code')->nullable();
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
        Schema::dropIfExists('orders');
    }
};
