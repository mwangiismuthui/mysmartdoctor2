<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDoctorsTable extends Migration
{

    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('given_name')->nullable();
            $table->string('family_name')->nullable();
            $table->string('email')->nullable();
            $table->string('areas_Of_expertise1')->nullable();
            $table->string('areas_Of_expertise2')->nullable();
            $table->string('areas_Of_expertise3')->nullable();
            $table->string('medical_centers_that_you_are_parctsing1')->nullable();
            $table->string('medical_centers_that_you_are_parctsing2')->nullable();
            $table->string('medical_centers_that_you_are_parctsing3')->nullable();
            $table->string('locations_that_you_are_practicing1')->nullable();
            $table->string('locations_that_you_are_practicing2')->nullable();
            $table->string('locations_that_you_are_practicing3')->nullable();
            $table->string('refereed_person')->nullable();
            $table->string('refereed_person_mobile_number')->nullable();
            $table->string('passport')->nullable();
            $table->string('image')->nullable();
            $table->string('registration_no')->nullable();
            $table->string('signature')->nullable();
            $table->string('conditions')->nullable();
            $table->longText('languages_spoken')->nullable();
            $table->longText('education')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('alternative_mobile_no')->nullable();
            $table->longText('private_practice_address')->nullable();
            $table->longText('qualification')->nullable();
            $table->longText('professional_experiences')->nullable();

            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::drop('doctors');
    }
}