<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProminentUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prominent_users', function (Blueprint $table) {
            $table->id();
            $table->string('surname');
            $table->string('name');
            $table->string('patronymic');
            $table->text('avatar_path');
            $table->longText('biography');
            $table->longText('works');
            $table->longText('extra_information');
            $table->date('birth_date');
            $table->integer('sex');
            $table->unsignedBigInteger('area_id');
            $table->foreign('area_id')->on('prominent_areas')->references('id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prominent_users');
    }
}
