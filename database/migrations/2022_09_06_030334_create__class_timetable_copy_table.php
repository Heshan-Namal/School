<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassTimetableCopyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classtimetablecopy', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('day')->nullable(false);
            $table->string('period1')->nullable(false);
            $table->string('period2')->nullable(false);
            $table->string('period3')->nullable(false);
            $table->string('period4')->nullable(false);
            $table->string('period5')->nullable(false);
            $table->string('period6')->nullable(false);
            $table->string('period7')->nullable(false);
            $table->string('period8')->nullable(false);
            $table->unsignedBigInteger('class_id');
            $table->foreign('class_id')->references('id')->on('class');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_class_timetable_copy');
    }
}