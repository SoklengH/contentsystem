<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Setting::create([
        	'site_name'      => "Laravel\'s Blog",
        	'contact_number' => '081 53 43 00',
        	'contact_email'  => 'soklengheang2015@gmail.com',
        	'address'		 => 'Kirirom Mount Yerng Ng'
        ]);
    }
}
