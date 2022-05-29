<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGradeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Grade', function (Blueprint $table) {
            $table->id();
            $table->integer('grade_no');
            $table->integer('num_of_student');
            $table->unsignedBigInteger('admin_id');
            $table->unsignedBigInteger('teacher_id');
            $table->foreign('admin_id')->references('id')->on('Admin')->onDelete('cascade');
            $table->foreign('teacher_id')->references('id')->on('Teacher')->onDelete('cascade');
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
        Schema::dropIfExists('Grade');
    }
}
