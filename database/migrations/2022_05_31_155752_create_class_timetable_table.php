<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassTimetableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_timetable', function (Blueprint $table) {
            $table->id();
            $table->string('day')->nullable(false);
            $table->string('period')->nullable(false);
            $table->unsignedBigInteger('subject_id');
            $table->unsignedBigInteger('class_id');
            $table->unsignedBigInteger('teacher_id');
            $table->unsignedBigInteger('admin_id');
            $table->foreign('admin_id')->references('id')->on('admin')->onDelete('cascade');
            $table->foreign('subject_id')->references('id')->on('subject')->onDelete('cascade');
            $table->foreign('class_id')->references('id')->on('class')->onDelete('cascade');
            $table->foreign('teacher_id')->references('id')->on('teacher')->onDelete('cascade');
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
        Schema::dropIfExists('class_timetable');
    }
}
