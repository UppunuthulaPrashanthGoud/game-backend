<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AppSetting;

class AppSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AppSetting::firstOrCreate([], [
            'admob_app_id' => 'ca-app-pub-3940256099942544~1458002511',
            'admob_banner_id' => 'ca-app-pub-3940256099942544/6300978111',
            'admob_interstitial_id' => 'ca-app-pub-3940256099942544/1033173712',
            'admob_rewarded_id' => 'ca-app-pub-3940256099942544/5224354917',
            'ads_enabled' => true,
        ]);
    }
}
