<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       $setting = new  \App\Models\Setting();
       $setting->complete_rate = 100;
       $setting->late_rate = 80;
       $setting->reject_rate = 40;
       $setting->save();
    }
}
