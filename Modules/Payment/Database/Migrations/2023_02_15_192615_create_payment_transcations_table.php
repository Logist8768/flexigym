<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_transcations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('payment_method_id');
            $table->enum('type', ['order', 'subscription']);
            $table->float('amount');
            $table->bigInteger('created_by_id')->index();
            $table->string('created_by_model');
            $table->foreignId('order_id')->nullable();
            $table->foreignId('subscription')->nullable();
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
        Schema::dropIfExists('payment_transcations');
    }
};
