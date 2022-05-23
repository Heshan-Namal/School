<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGradeTeacherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Grade_teacher', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('teacher_id');
            $table->unsignedBigInteger('grade_id');
            $table->foreign('teacher_id')->references('id')->on('Teacher')->onDelete('cascade');
            $table->foreign('grade_id')->references('id')->on('Grade')->onDelete('cascade');
            $table->unique(['teacher_id','grade_id']);
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
        Schema::dropIfExists('Grade_teacher');
    }
}
