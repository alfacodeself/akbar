<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'merchant' => 'Akbar Uwu',
            'logo' => 'no-image',
            'owner' => 'Rojab Maulana Akbar',
            'phone_number' => '6282139043511',
            'address' => 'Probolinggo',
            'lat' => '-7.756928',
            'lng' => '113.211502',
            'facebook' => 'akbar123facebook',
            'whatsapp' => '6282139043511',
            'instagram' => '@akbarig'
        ]);
    }
}
