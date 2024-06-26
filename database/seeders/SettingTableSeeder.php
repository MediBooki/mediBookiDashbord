<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'email'             => 'mediabookie@mediabookie.com',
            'phone'             => '01100011110',
            'whatsapp_phone'    => '01100011110'
        ]);
    }
}
