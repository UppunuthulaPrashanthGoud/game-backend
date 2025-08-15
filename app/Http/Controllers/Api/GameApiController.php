<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\AppSetting;
use Illuminate\Http\JsonResponse;

class GameApiController extends Controller
{
    public function index(): JsonResponse
    {
        $games = Game::query()
            ->where('is_active', true)
            ->with(['category' => function ($q) {
                $q->where('is_active', true);
            }])
            ->get()
            ->map(function (Game $g) {
                return [
                    'title' => $g->title,
                    'category' => optional($g->category)->name ?? 'General',
                    'categoryIcon' => $g->category && $g->category->icon ? asset('storage/'.$g->category->icon) : null,
                    'url' => $g->url,
                    'requiresVpn' => (bool) $g->requires_vpn,
                    'icon' => $g->icon ? asset('storage/'.$g->icon) : null,
                ];
            });

        $settings = AppSetting::first();
        return response()->json([
            'ads' => [
                'enabled' => (bool)($settings->ads_enabled ?? true),
                'provider' => $settings->ad_provider ?? 'admob',
                'admobAppId' => $settings->admob_app_id ?? null,
                'bannerId' => $settings->admob_banner_id ?? null,
                'interstitialId' => $settings->admob_interstitial_id ?? null,
                'rewardedId' => $settings->admob_rewarded_id ?? null,
                'providers' => [
                    'applovin' => [
                        'enabled' => (bool)($settings->applovin_enabled ?? false),
                        'sdkKey' => $settings->applovin_sdk_key ?? null,
                    ],
                    'ironsource' => [
                        'enabled' => (bool)($settings->ironsource_enabled ?? false),
                        'appKey' => $settings->ironsource_app_key ?? null,
                    ],
                    'unitymax' => [
                        'enabled' => (bool)($settings->unitymax_enabled ?? false),
                        'gameId' => $settings->unity_game_id ?? null,
                    ],
                    'leadbolt' => [
                        'enabled' => (bool)($settings->leadbolt_enabled ?? false),
                        'apiKey' => $settings->leadbolt_api_key ?? null,
                    ],
                    'adpushup' => [
                        'enabled' => (bool)($settings->adpushup_enabled ?? false),
                        'siteId' => $settings->adpushup_site_id ?? null,
                    ],
                    'smartyads' => [
                        'enabled' => (bool)($settings->smartyads_enabled ?? false),
                        'appId' => $settings->smartyads_app_id ?? null,
                    ],
                    'medianet' => [
                        'enabled' => (bool)($settings->medianet_enabled ?? false),
                        'siteId' => $settings->medianet_site_id ?? null,
                    ],
                ],
            ],
            'games' => $games,
        ]);
    }
}
