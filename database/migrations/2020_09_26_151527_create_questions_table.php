<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->unsignedBigInteger('survey_id');
            $table->foreign('survey_id')
                ->references('id')
                ->on('surveys');
            $table->unsignedBigInteger('question_type_id');
            $table->foreign('question_type_id')
                ->references('id')
                ->on('question_types');
            $table->boolean('required')->default(false);
            $table->boolean('need_custom_answer')->default(false);
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
        Schema::dropIfExists('questions');
    }
}
