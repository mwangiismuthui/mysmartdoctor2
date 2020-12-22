<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLabReportsTable extends Migration
{
  
    public function up()
    {
        Schema::create('lab_reports', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('report_name')->nullable();
            $table->string('file')->nullable();
            $table->integer('patient_id')->unsigned();
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade')->onUpdate('cascade');
            });
    }

  
    public function down()
    {
        Schema::drop('lab_reports');
    }
}