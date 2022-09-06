<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notification', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('subject')->nullable(false);
            $table->string('header')->nullable(false);
            $table->unsignedBigInteger('class_id');
            $table->unsignedBigInteger('sender_id');
            $table->foreign('class_id')->references('id')->on('class');
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
        Schema::dropIfExists('notification');
    }
}