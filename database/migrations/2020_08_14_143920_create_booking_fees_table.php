<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBookingFeesTable extends Migration
{
  
    public function up()
    {
        Schema::create('booking_fees', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('fee')->nullable();
            });
    }

  
    public function down()
    {
        Schema::drop('booking_fees');
    }
}
