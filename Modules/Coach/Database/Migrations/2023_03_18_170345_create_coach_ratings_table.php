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
        Schema::create('coach_ratings', function (Blueprint $table) {
            $table->id();
            $table->float('rate');
            $table->foreignIdFor(Client::class);
            $table->foreignIdFor(Coach::class);
            $table->text('comments')->nullable();
            $table->index('coach_id');
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
        Schema::dropIfExists('coaches_ratings');
    }
};
