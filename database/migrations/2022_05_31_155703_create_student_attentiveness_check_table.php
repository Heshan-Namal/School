<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentAttentivenessCheckTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_attentiveness_check', function (Blueprint $table) {
            $table->id();
            $table->string('admission_no');
            $table->unsignedBigInteger('A_check_id');
            $table->integer('total_points')->nullable(false);
            $table->foreign('admission_no')->references('admission_no')->on('student')->onDelete('cascade');
            $table->foreign('A_check_id')->references('id')->on('attentiveness_check_question')->onDelete('cascade');
            $table->unique(['admission_no','A_check_id']);
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
        Schema::dropIfExists('student_attentiveness_check');
    }
}
