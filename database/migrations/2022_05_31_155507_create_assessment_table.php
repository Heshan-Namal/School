<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssessmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assessment', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable(false);
            $table->string('description')->nullable(true);
            $table->string('term')->nullable(false);
            $table->string('week')->nullable(true);
            $table->string('extra_week')->nullable(true);
            $table->string('day')->nullable(false);
            $table->date('due_date')->nullable(false);
            $table->enum('status',['published', 'draft', 'disabled'])->default('draft')->nullable(false);
            $table->enum('assessment_type',['mcq_quiz', 'upload_file'])->nullable(false);
            $table->integer('allocated_marks')->nullable(false);
            $table->string('assessment_file')->nullable(true);
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
        Schema::dropIfExists('assessment');
    }
}
