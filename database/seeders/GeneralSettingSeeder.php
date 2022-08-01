<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\GeneralSetting;
class GeneralSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GeneralSetting::create([
            'key'=>'site_title',
            'value'=>'Disease identifier on Big Data'
        ]);
        GeneralSetting::create([
            'key'=>'short_title',
            'value'=>'Parkinson'
        ]);
        GeneralSetting::create([
            'key'=>'copyrights',
            'value'=>'All Rights Reserved'
        ]);
    }
}
