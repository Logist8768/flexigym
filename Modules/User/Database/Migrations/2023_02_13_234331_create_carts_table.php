<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Cart\Enums\CartStatus;
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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Client::class);
            $table->foreignIdFor(Address::class)->nullable();
            $table->float('subtotal')->default(0);
            $table->float('vat')->default(0);
            $table->float('discount')->default(0);
            $table->float('total')->default(0);
            $table->string('coupon_code')->nullable();
            $table->enum('status', CartStatus::getValues())->default(CartStatus::OPENED);
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
        Schema::dropIfExists('carts');
    }
};
