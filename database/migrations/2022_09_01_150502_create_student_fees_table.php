<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_fees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fee_id');
            $table->string('admission_no');
            $table->string('proof')->nullable(true);;
            $table->foreign('admission_no')->references('admission_no')->on('student')->onDelete('cascade');
            $table->foreign('fee_id')->references('id')->on('facility_fees')->onDelete('cascade');
            $table->unique(['admission_no','fee_id']);
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
        Schema::dropIfExists('student_fees');
    }
}
