<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimetableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Timetable', function (Blueprint $table) {
            $table->id();
            $table->string('day');
            $table->string('period1');
            $table->string('period2');
            $table->string('period3');
            $table->string('period4');
            $table->string('period5');
            $table->string('period6');
            $table->string('period7');
            $table->string('period8');
            $table->unsignedBigInteger('class_id');
            $table->unsignedBigInteger('teacher_id');
            $table->timestamps();
            $table->foreign('class_id')->references('id')->on('Class')->onDelete('cascade');
            $table->foreign('teacher_id')->references('id')->on('Teacher')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Timetable');
    }
}
