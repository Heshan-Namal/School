<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Link', function (Blueprint $table) {
            $table->id();
            $table->longText('title');
            $table->longText('description');
            $table->string('links');
            $table->string('status')->default('Pending');
            $table->unsignedBigInteger('class_id');
            $table->unsignedBigInteger('subject_id');
            $table->unsignedBigInteger('teacher_id');
            $table->timestamps();
            $table->foreign('class_id')->references('id')->on('Class')->onDelete('cascade');
            $table->foreign('subject_id')->references('id')->on('Subject')->onDelete('cascade');
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
        Schema::dropIfExists('Link');
    }
}
