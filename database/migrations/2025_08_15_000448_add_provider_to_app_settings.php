<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('app_settings', function (Blueprint $table) {
            $table->string('ad_provider')->default('admob');
            $table->boolean('applovin_enabled')->default(false);
            $table->boolean('ironsource_enabled')->default(false);
            $table->boolean('unitymax_enabled')->default(false);
            $table->boolean('leadbolt_enabled')->default(false);
            $table->boolean('adpushup_enabled')->default(false);
            $table->boolean('smartyads_enabled')->default(false);
            $table->boolean('medianet_enabled')->default(false);

            $table->string('applovin_sdk_key')->nullable();
            $table->string('ironsource_app_key')->nullable();
            $table->string('unity_game_id')->nullable();
            $table->string('leadbolt_api_key')->nullable();
            $table->string('adpushup_site_id')->nullable();
            $table->string('smartyads_app_id')->nullable();
            $table->string('medianet_site_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('app_settings', function (Blueprint $table) {
            $table->dropColumn([
                'ad_provider',
                'applovin_enabled','ironsource_enabled','unitymax_enabled','leadbolt_enabled','adpushup_enabled','smartyads_enabled','medianet_enabled',
                'applovin_sdk_key','ironsource_app_key','unity_game_id','leadbolt_api_key','adpushup_site_id','smartyads_app_id','medianet_site_id',
            ]);
        });
    }
};
