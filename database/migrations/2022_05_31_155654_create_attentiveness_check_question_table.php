<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttentivenessCheckQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attentiveness_check_question', function (Blueprint $table) {
            $table->id();
            $table->integer('question_no')->nullable(false);
            $table->string('option_1')->nullable(false);
            $table->string('option_2')->nullable(false);
            $table->string('option_3')->nullable(false);
            $table->string('option_4')->nullable(false);
            $table->string('correct_answer')->nullable(false);
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
        Schema::dropIfExists('attentiveness_check_question');
    }
}
