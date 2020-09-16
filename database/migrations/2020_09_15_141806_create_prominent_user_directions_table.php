<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProminentUserDirectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prominent_user_directions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('prominent_user_id');
            $table->unsignedBigInteger('direction_id');
            $table->foreign('prominent_user_id')->on('prominent_users')->references('id');
            $table->foreign('direction_id')->on('prominent_directions')->references('id');
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
        Schema::dropIfExists('prominent_user_directions');
    }
}
