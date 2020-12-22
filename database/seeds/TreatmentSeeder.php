<?php

use Illuminate\Database\Seeder;

class TreatmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('treatment')->insert([
            'treatment' => 'Dental X ray ',
        ]);
        DB::table('treatment')->insert([
            'treatment' => ' Root canal treatment',
        ]);
        DB::table('treatment')->insert([
            'treatment' => 'Complete denture',
        ]);
        DB::table('treatment')->insert([
            'treatment' => 'Crowns',
        ]);
        DB::table('treatment')->insert([
            'treatment' => 'Bridge',
        ]);
        DB::table('treatment')->insert([
            'treatment' => 'Implants',
        ]);
        DB::table('treatment')->insert([
            'treatment' => 'Ultrasonic scaling',
        ]);
        DB::table('treatment')->insert([
            'treatment' => 'Normal extraction',
        ]);
        DB::table('treatment')->insert([
            'treatment' => 'Wisdom tooth removal',
        ]);
        DB::table('treatment')->insert([
            'treatment' => 'Consultation',
        ]);
        DB::table('treatment')->insert([
            'treatment' => 'Silver color Filling',
        ]);
        DB::table('treatment')->insert([
            'treatment' => 'Tooth colored filling',
        ]);
        DB::table('treatment')->insert([
            'treatment' => 'Bleaching',
        ]);
        DB::table('treatment')->insert([
            'treatment' => 'Fixed orthodontic RX',
        ]);
        DB::table('treatment')->insert([
            'treatment' => 'Removable orthodontic treatment ',
        ]);
        DB::table('treatment')->insert([
            'treatment' => 'Minor oral surgery ',
        ]);
        DB::table('treatment')->insert([
            'treatment' => 'Partial & removable denture ',
        ]);
        DB::table('treatment')->insert([
            'treatment' => 'USS scan ',
        ]);
        DB::table('treatment')->insert([
            'treatment' => 'CBCT ',
        ]);
    }
}
