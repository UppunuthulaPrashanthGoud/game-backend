<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AppSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AppSettingController extends Controller
{
    public function edit(): View
    {
        $setting = AppSetting::first();
        return view('admin.settings.edit', compact('setting'));
    }

    public function update(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'admob_app_id' => 'nullable|string|max:200',
            'admob_banner_id' => 'nullable|string|max:200',
            'admob_interstitial_id' => 'nullable|string|max:200',
            'admob_rewarded_id' => 'nullable|string|max:200',
            'ads_enabled' => 'sometimes|boolean',
            'ad_provider' => 'nullable|string|in:admob,applovin,ironsource,unitymax,leadbolt,adpushup,smartyads,medianet',
            'applovin_enabled' => 'sometimes|boolean',
            'ironsource_enabled' => 'sometimes|boolean',
            'unitymax_enabled' => 'sometimes|boolean',
            'leadbolt_enabled' => 'sometimes|boolean',
            'adpushup_enabled' => 'sometimes|boolean',
            'smartyads_enabled' => 'sometimes|boolean',
            'medianet_enabled' => 'sometimes|boolean',
            'applovin_sdk_key' => 'nullable|string|max:255',
            'ironsource_app_key' => 'nullable|string|max:255',
            'unity_game_id' => 'nullable|string|max:255',
            'leadbolt_api_key' => 'nullable|string|max:255',
            'adpushup_site_id' => 'nullable|string|max:255',
            'smartyads_app_id' => 'nullable|string|max:255',
            'medianet_site_id' => 'nullable|string|max:255',
        ]);
        foreach ([
          'ads_enabled','applovin_enabled','ironsource_enabled','unitymax_enabled','leadbolt_enabled','adpushup_enabled','smartyads_enabled','medianet_enabled'
        ] as $flag) {
            $data[$flag] = $request->boolean($flag);
        }
        $setting = AppSetting::first();
        if ($setting) {
            $setting->update($data);
        } else {
            AppSetting::create($data);
        }
        return back()->with('status', 'Saved');
    }
}
