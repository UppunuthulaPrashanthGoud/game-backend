<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'admob_app_id', 'admob_banner_id', 'admob_interstitial_id', 'admob_rewarded_id', 'ads_enabled',
    ];
    protected $casts = [
        'ads_enabled' => 'boolean',
    ];
}
