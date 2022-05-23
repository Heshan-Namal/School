<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentQuizTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Student_quiz', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('quiz_id');
            $table->integer('marks');
            $table->foreign('student_id')->references('id')->on('Student')->onDelete('cascade');
            $table->foreign('quiz_id')->references('id')->on('Quiz')->onDelete('cascade');
            $table->unique(['student_id','quiz_id']);
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
        Schema::dropIfExists('Student_quiz');
    }
}
