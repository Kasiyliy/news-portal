<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyResultAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_result_answers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('question_id');
            $table->foreign('question_id')
                ->references('id')
                ->on('questions');
            $table->unsignedBigInteger('question_option_id')->nullable();
            $table->foreign('question_option_id')
                ->references('id')
                ->on('question_options');
            $table->text('text')->nullable();
            $table->unsignedBigInteger('survey_result_id');
            $table->foreign('survey_result_id')
                ->references('id')
                ->on('survey_results');

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
        Schema::dropIfExists('survey_result_answers');
    }
}
