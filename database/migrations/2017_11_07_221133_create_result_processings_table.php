<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateResultProcessingsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('result_processings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id')->unsigned();
            $table->integer('session_id')->unsigned();
            $table->string('semester');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('session_id')->references('id')->on('school_sessions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('result_processings');
    }
}
