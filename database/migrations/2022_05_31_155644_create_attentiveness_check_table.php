<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttentivenessCheckTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attentiveness_check', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('term')->nullable(false);
            $table->string('week')->nullable(true);
            $table->string('extra_week')->nullable(true);
            $table->string('day')->nullable(false);
            $table->string('period')->nullable(false);
            $table->enum('status',['published', 'draft', 'disabled'])->defualt('draft')->nullable(false);
            $table->integer('quiz_duration')->nullable(false);
            $table->integer('no_of_questions')->nullable(false);
            $table->unsignedBigInteger('subject_id');
            $table->unsignedBigInteger('class_id');
            $table->unsignedBigInteger('teacher_id');
            $table->timestamps();
            $table->foreign('subject_id')->references('id')->on('subject')->onDelete('cascade');
            $table->foreign('class_id')->references('id')->on('class')->onDelete('cascade');
            $table->foreign('teacher_id')->references('id')->on('teacher')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attentiveness_check');
    }
}
