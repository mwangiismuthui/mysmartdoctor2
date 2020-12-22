<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBookingsTable extends Migration
{

    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('patient_id')->unsigned();
            $table->integer('doctor_id')->unsigned();
            $table->string('urgency', 100)->nullable();
            $table->string('specialty', 100)->nullable();
            $table->string('professional_fee', 100)->nullable();
            $table->string('service_fee', 100)->nullable();
            $table->string('total', 100)->nullable();
            $table->string('status', 100)->nullable();
            $table->integer('booking_no');
            $table->date('date')->nullable();
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::drop('bookings');
    }
}