<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePatientsTable extends Migration
{

    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->string('first_name')->nullable();
            $table->string('surname')->nullable();
            $table->string('parent_detail')->nullable();
            $table->string('parent_name')->nullable();
            $table->string('patient_DOB')->nullable();
            $table->string('patient_age')->nullable();
            $table->string('patient_address')->nullable();
            $table->string('telephone_number')->nullable();
            $table->string('telephone_number2')->nullable();
            $table->string('tooth_ache')->nullable();
            $table->string('joint_pain')->nullable();
            $table->string('Bad_smell_from_mouth')->nullable();
            $table->string('wisdom_tooth')->nullable();
            $table->string('gum_bleeding')->nullable();
            $table->string('fell_down_and_injury_to_teeth')->nullable();
            $table->string('lump_in_the_mouth')->nullable();
            $table->string('referral_from_other_dentist')->nullable();
            $table->string('cavity_cavities')->nullable();
            $table->string('need_artificial_teeth')->nullable();
            $table->string('need_dental_implant')->nullable();
            $table->string('ugly_teeth')->nullable();
            $table->string('discolored_teeth')->nullable();
            $table->string('fracture_jaw')->nullable();
            $table->string('other_please_specify')->nullable();
            $table->string('hospitalization')->nullable();
            $table->string('allergy')->nullable();
            $table->string('breathing_problem')->nullable();
            $table->string('high_blood_pressure')->nullable();
            $table->string('fever')->nullable();
            $table->string('diabetes')->nullable();
            $table->string('heart_problems')->nullable();
            $table->string('kidney_problems')->nullable();
            $table->string('bleeding_problems')->nullable();
            $table->string('epilepsy')->nullable();
            $table->string('gastro_intestinal_problem')->nullable();
            $table->string('other')->nullable();
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->string('image4')->nullable();
            $table->string('image5')->nullable();
            $table->string('image6')->nullable();
            $table->string('image7')->nullable();
            $table->string('image8')->nullable();

            $table->string("weight")->nullable();
            $table->string("height")->nullable();
            $table->string("blood_group")->nullable();
            $table->string("per_day")->nullable();
            $table->string("how_long")->nullable();
            $table->string("cholesterol")->nullable();
            $table->string("blood_sugar")->nullable();
            $table->string("blood_pressure")->nullable();
            $table->string("heart_rate")->nullable();

            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::drop('patients');
    }
}
