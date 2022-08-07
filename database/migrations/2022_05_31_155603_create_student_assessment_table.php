<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentAssessmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_assessment', function (Blueprint $table) {
            $table->id();
            $table->string('admission_no');
            $table->unsignedBigInteger('assessment_id');
            $table->date('uploaded_date')->nullable(false);
            $table->string('answer_file');
            $table->string('assessment_marks')->nullable(true);
            $table->foreign('admission_no')->references('admission_no')->on('student')->onDelete('cascade');
            $table->foreign('assessment_id')->references('id')->on('assessment')->onDelete('cascade');
            $table->unique(['admission_no','assessment_id']);
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
        Schema::dropIfExists('student_assessment');
    }
}
