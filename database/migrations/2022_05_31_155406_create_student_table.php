<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Helpers\Qs;

class CreateStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student', function (Blueprint $table) {
            $table->id();
            $table->string('admission_no')->unique();
            $table->string('full_name')->nullable(false);
            $table->date('dob');
            $table->string('guardian_name')->nullable(false);
            $table->string('guardian_email', 100)->unique();
            $table->string('guardian_contact_no')->nullable(false);
            $table->longText('address')->nullable(false);
            $table->string('photo')->default(Qs::getDefaultUserImage());
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('grade_id');
            $table->unsignedBigInteger('admin_id');
            $table->unsignedBigInteger('class_id');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade');
            $table->foreign('grade_id')->references('id')->on('grade')->onDelete('cascade');
            $table->foreign('admin_id')->references('id')->on('admin')->onDelete('cascade');
            $table->foreign('class_id')->references('id')->on('class')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student');
    }
}
