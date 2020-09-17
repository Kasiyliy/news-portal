<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_projects', function (Blueprint $table) {
            $table->id();
            $table->string('main_title');
            $table->longText('main_description');
            $table->string('main_image', 255);
            $table->string('footer_title');
            $table->string('footer_image', 255);
            $table->string('footer_address');
            $table->string('footer_number');
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
        Schema::dropIfExists('about_projects');
    }
}
