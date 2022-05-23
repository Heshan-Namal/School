<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeriodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Period', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->json('links')->nullable();
            $table->json('notes')->nullable();
            $table->unsignedBigInteger('timetable_id');
            $table->unsignedBigInteger('class_id');
            $table->timestamps();
            $table->foreign('timetable_id')->references('id')->on('Timetable')->onDelete('cascade');
            $table->foreign('class_id')->references('id')->on('Class')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Period');
    }
}
