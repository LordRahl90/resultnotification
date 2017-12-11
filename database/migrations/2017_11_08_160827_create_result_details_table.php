<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateResultDetailsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('result_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('result_process_id')->unsigned();
            $table->integer('student_id')->unsigned();
            $table->integer('score');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('result_process_id')->references('id')->on('result_processings');
            $table->foreign('student_id')->references('id')->on('students');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('result_details');
    }
}
