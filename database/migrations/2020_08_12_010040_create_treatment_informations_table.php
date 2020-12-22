<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTreatmentInformationsTable extends Migration
{

    public function up()
    {
        Schema::create('treatment_informations', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('treatment')->nullable();
            $table->time('time')->nullable();
            $table->string('cost')->nullable();
            $table->string('total_paid')->nullable();
            $table->string('balance')->nullable();

            $table->integer('patient_id')->unsigned();
            $table->integer('doctor_id')->unsigned();

            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::drop('treatment_informations');
    }
}