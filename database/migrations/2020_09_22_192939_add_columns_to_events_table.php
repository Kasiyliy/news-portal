<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->date('date');
            $table->text('representative')->nullable();
            $table->text('place')->nullable();
            $table->string('fio')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn('date');
            $table->dropColumn('representative');
            $table->dropColumn('place');
            $table->dropColumn('fio');
            $table->dropColumn('phone');
            $table->dropColumn('email');
            $table->dropColumn('website');
        });
    }
}
