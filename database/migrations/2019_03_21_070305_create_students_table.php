<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('student_id')->index()->unsigned()->nullable();
            $table->integer('grade_id')->index()->unsigned()->nullable();
            $table->integer('section_id')->index()->unsigned()->nullable();
            $table->integer('photo_id')->index()->unsigned()->nullable();
            $table->integer('is_active')->default(0);
            $table->string('firstName')->nullable();
            $table->string('middleName')->nullable();
            $table->string('lastName')->nullable();
            $table->string('guardian_name')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('g_s_code')->index()->nullable();
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
        Schema::dropIfExists('students');
    }
}
