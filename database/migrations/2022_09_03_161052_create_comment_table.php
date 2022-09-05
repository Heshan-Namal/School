<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('comment')->nullable(false);
            $table->string('status')->nullable(false);
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('sender_id');
            $table->foreign('user_id')->references('id')->on('student');
            $table->foreign('sender_id')->references('id')->on('user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comment');
    }
}