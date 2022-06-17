<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssessmentQuizQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assessment_quiz_question', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('assessment_id')->nullable(false);
            $table->string('question')->nullable(false);
            $table->string('option_1')->nullable(false);
            $table->string('option_2')->nullable(false);
            $table->string('option_3')->nullable(false);
            $table->string('option_4')->nullable(false);
            $table->string('correct_answer')->nullable(false);
            $table->timestamps();
            $table->foreign('assessment_id')->references('id')->on('assessment')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assessment_quiz_question');
    }
}
