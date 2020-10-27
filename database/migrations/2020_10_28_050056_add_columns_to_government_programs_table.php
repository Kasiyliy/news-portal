<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToGovernmentProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('government_programs', function (Blueprint $table) {
            $table->text('digital_help')->nullable();
            $table->text('traditional_help')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('government_programs', function (Blueprint $table) {
            $table->dropColumn('digital_help');
            $table->dropColumn('traditional_help');
        });
    }
}
