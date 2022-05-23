<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Assignment', function (Blueprint $table) {
            $table->id();
            $table->longText('title');
            $table->longText('description');
            $table->string('assignments');
            $table->string('status')->default('Pending');
            $table->unsignedBigInteger('class_id');
            $table->unsignedBigInteger('subject_id');
            $table->timestamps();
            $table->foreign('class_id')->references('id')->on('Class')->onDelete('cascade');
            $table->foreign('subject_id')->references('id')->on('Subject')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Assignment');
    }
}
