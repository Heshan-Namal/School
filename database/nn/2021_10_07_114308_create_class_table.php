<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Class', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('num_of_student');
            $table->unsignedBigInteger('admin_id');
            $table->unsignedBigInteger('teacher_id');
            $table->unsignedBigInteger('grade_id');
            $table->timestamps();
            $table->foreign('admin_id')->references('id')->on('Admin')->onDelete('cascade');
            $table->foreign('teacher_id')->references('id')->on('Teacher')->onDelete('cascade');
            $table->foreign('grade_id')->references('id')->on('Grade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Class');
    }
}
