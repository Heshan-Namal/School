<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacilityFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facility_fees', function (Blueprint $table) {
            $table->id();
            $table->string('year')->nullable(false);
            $table->unsignedBigInteger('grade_id');
            $table->unsignedBigInteger('admin_id');
            $table->decimal('amount', 8, 2)->nullable()->default(00.00);
            $table->string('note')->nullable(true);
            $table->foreign('grade_id')->references('id')->on('grade')->onDelete('cascade');
            $table->foreign('admin_id')->references('id')->on('admin')->onDelete('cascade');
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
        Schema::dropIfExists('facility_fees');
    }
}
