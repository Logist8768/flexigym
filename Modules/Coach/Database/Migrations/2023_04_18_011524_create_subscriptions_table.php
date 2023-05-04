<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\User\Entities\Client;
use Modules\User\Entities\Coach;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Client::class);
            $table->foreignIdFor(Coach::class);
            $table->foreignId('payment_method_id')->nullable();
            $table->string('transaction_id')->nullable();
            $table->enum('status', ['pending', 'failed', 'cancelled', 'successful'])->default('pending');
            $table->date('start_date');
            $table->date('end_date');
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
        Schema::dropIfExists('subscriptions');
    }
};
