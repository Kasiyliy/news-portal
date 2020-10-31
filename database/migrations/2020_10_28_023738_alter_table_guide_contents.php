<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableGuideContents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('guide_contents', function (Blueprint $table) {
            $table->renameColumn('description', 'street');
            $table->text('time')->nullable();
            $table->text('phone')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('guide_contents', function (Blueprint $table) {
            //
        });
    }
}
