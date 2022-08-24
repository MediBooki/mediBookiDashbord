<?php

namespace Database\Seeders;

use App\Models\Appointment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppointmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('appointments')->delete();
        $appointments = [
            ['en'=> 'Saturday', 'ar'=> 'السبت'],
            ['en'=> 'Sunday', 'ar'=> 'الاحد'],
            ['en'=> 'Monday', 'ar'=> 'الاثنين'],
            ['en'=> 'Tuesday', 'ar'=> 'الثلاثاء'],
            ['en'=> 'Wednesday', 'ar'=> 'الاربعاء'],
            ['en'=> 'Thursday', 'ar'=> 'الخميس'],
            ['en'=> 'Friday', 'ar'=> 'الجمعة'],
        ];
        foreach ($appointments as $S) {
            Appointment::create(['name' => $S]);
        }
    }
}
