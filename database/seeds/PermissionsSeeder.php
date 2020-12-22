<?php

use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {DB::table('permissions')->truncate();

        DB::table('permissions')->insert(['name' => 'patient-show']);
        DB::table('permissions')->insert(['name' => 'patient-create']);
        DB::table('permissions')->insert(['name' => 'patient-edit']);
        DB::table('permissions')->insert(['name' => 'patient-delete']);

        DB::table('permissions')->insert(['name' => 'doctor-show']);
        DB::table('permissions')->insert(['name' => 'doctor-create']);
        DB::table('permissions')->insert(['name' => 'doctor-edit']);
        DB::table('permissions')->insert(['name' => 'doctor-delete']);

        DB::table('permissions')->insert(['name' => 'booking-show']);
        DB::table('permissions')->insert(['name' => 'booking-create']);
        DB::table('permissions')->insert(['name' => 'booking-edit']);
        DB::table('permissions')->insert(['name' => 'booking-delete']);

        DB::table('permissions')->insert(['name' => 'treatmentinformation-show']);
        DB::table('permissions')->insert(['name' => 'treatmentinformation-create']);
        DB::table('permissions')->insert(['name' => 'treatmentinformation-edit']);
        DB::table('permissions')->insert(['name' => 'treatmentinformation-delete']);

        DB::table('permissions')->insert(['name' => 'bookingfee-show']);
        DB::table('permissions')->insert(['name' => 'bookingfee-create']);
        DB::table('permissions')->insert(['name' => 'bookingfee-edit']);
        DB::table('permissions')->insert(['name' => 'bookingfee-delete']);

        DB::table('permissions')->insert(['name'=> 'labreport-show']);
        DB::table('permissions')->insert(['name'=> 'labreport-create']);
        DB::table('permissions')->insert(['name'=> 'labreport-edit']);
        DB::table('permissions')->insert(['name'=> 'labreport-delete']);
        DB::table('permissions')->insert(['name'=> 'xray-show']);
        DB::table('permissions')->insert(['name'=> 'xray-create']);
        DB::table('permissions')->insert(['name'=> 'xray-edit']);
        DB::table('permissions')->insert(['name'=> 'xray-delete']);
        DB::table('permissions')->insert(['name'=> 'medication-show']);
        DB::table('permissions')->insert(['name'=> 'medication-create']);
        DB::table('permissions')->insert(['name'=> 'medication-edit']);
        DB::table('permissions')->insert(['name'=> 'medication-delete']);
        DB::table('permissions')->insert(['name'=> 'labreport-show']);
        DB::table('permissions')->insert(['name'=> 'labreport-create']);
        DB::table('permissions')->insert(['name'=> 'labreport-edit']);
        DB::table('permissions')->insert(['name'=> 'labreport-delete']);
        DB::table('permissions')->insert(['name'=> 'chat-show']);
DB::table('permissions')->insert(['name'=> 'chat-create']);
DB::table('permissions')->insert(['name'=> 'chat-edit']);
DB::table('permissions')->insert(['name'=> 'chat-delete']);
    }
}
DB::table('permissions')->insert(['name'=> 'chat-show']);
DB::table('permissions')->insert(['name'=> 'chat-create']);
DB::table('permissions')->insert(['name'=> 'chat-edit']);
DB::table('permissions')->insert(['name'=> 'chat-delete']);