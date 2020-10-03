<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMapRegionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('map_regions', function (Blueprint $table) {
            $table->id();
            $table->string('region');
            $table->string('title');
            $table->text('description');
            $table->string('boss');
            $table->string('email');
            $table->string('phones');
            $table->string('address');
            $table->string('instagram')->nullable();
            $table->string('facebook')->nullable();
            $table->string('vk')->nullable();
            $table->string('youtube')->nullable();
            $table->string('twitter')->nullable();
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
        Schema::dropIfExists('map_regions');
    }
}
