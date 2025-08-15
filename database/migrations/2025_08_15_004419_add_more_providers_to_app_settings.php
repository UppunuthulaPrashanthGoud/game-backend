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
            $table->boolean('appodeal_enabled')->default(false);
            $table->string('appodeal_app_key')->nullable();

            $table->boolean('adpumb_enabled')->default(false);
            $table->string('adpumb_app_key')->nullable();

            $table->boolean('cas_enabled')->default(false);
            $table->string('cas_app_key')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('app_settings', function (Blueprint $table) {
            $table->dropColumn(['appodeal_enabled','appodeal_app_key','adpumb_enabled','adpumb_app_key','cas_enabled','cas_app_key']);
        });
    }
};
