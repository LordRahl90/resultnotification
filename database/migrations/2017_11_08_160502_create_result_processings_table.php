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
            $table->integer('session_id')->unsigned();
            $table->integer('semester_id');
            $table->integer('course_id')->unsigned();
            $table->integer('level_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('session_id')->references('id')->on('school_sessions');
            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreign('level_id')->references('id')->on('levels');
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
