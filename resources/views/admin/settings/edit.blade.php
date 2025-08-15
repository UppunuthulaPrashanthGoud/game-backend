@extends('layouts.admin')
@section('title','Ad Settings')
@section('content')
<div class="card mb-4">
  <div class="card-header d-flex align-items-center gap-2">
    <i class="bi bi-gear fs-4 text-primary"></i>
    <span class="fw-semibold">Ad Settings</span>
  </div>
  <div class="card-body">
    <form method="post" action="{{ route('admin.settings.update') }}" class="row g-3">
      @csrf @method('PUT')
      <div class="mb-3 d-flex align-items-center gap-3">
        <div class="form-check form-switch">
          <input class="form-check-input" type="checkbox" id="ads_enabled" name="ads_enabled" value="1" {{ ($setting->ads_enabled ?? true) ? 'checked' : '' }}>
          <label class="form-check-label" for="ads_enabled">Global Ads Enabled</label>
        </div>
        <div class="form-check form-switch">
          <input class="form-check-input" type="checkbox" id="ads_test_mode" name="ads_test_mode" value="1" {{ ($setting->ads_test_mode ?? false) ? 'checked' : '' }}>
          <label class="form-check-label" for="ads_test_mode">Test Mode</label>
          <span class="ms-2 text-muted" data-bs-toggle="tooltip" title="Enable test ad units for development."><i class="bi bi-info-circle"></i></span>
        </div>
      </div>
      <ul class="nav nav-tabs mb-3" id="adTabs" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="admob-tab" data-bs-toggle="tab" data-bs-target="#admob" type="button" role="tab">AdMob</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="applovin-tab" data-bs-toggle="tab" data-bs-target="#applovin" type="button" role="tab">AppLovin</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="ironsource-tab" data-bs-toggle="tab" data-bs-target="#ironsource" type="button" role="tab">IronSource</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="unitymax-tab" data-bs-toggle="tab" data-bs-target="#unitymax" type="button" role="tab">Unity MAX</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="leadbolt-tab" data-bs-toggle="tab" data-bs-target="#leadbolt" type="button" role="tab">Leadbolt</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="adpushup-tab" data-bs-toggle="tab" data-bs-target="#adpushup" type="button" role="tab">AdPushup</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="smartyads-tab" data-bs-toggle="tab" data-bs-target="#smartyads" type="button" role="tab">SmartyAds</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="medianet-tab" data-bs-toggle="tab" data-bs-target="#medianet" type="button" role="tab">Media.net</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="appodeal-tab" data-bs-toggle="tab" data-bs-target="#appodeal" type="button" role="tab">Appodeal</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="adpumb-tab" data-bs-toggle="tab" data-bs-target="#adpumb" type="button" role="tab">AdPumb</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="cas-tab" data-bs-toggle="tab" data-bs-target="#cas" type="button" role="tab">CAS</button>
        </li>
      </ul>
      <div class="tab-content" id="adTabsContent">
        <div class="tab-pane fade show active" id="admob" role="tabpanel">
          <div class="mb-2 form-check form-switch">
            <input class="form-check-input" type="checkbox" id="admob_enabled" name="admob_enabled" value="1" {{ ($setting->ad_provider ?? 'admob') === 'admob' ? 'checked' : '' }}>
            <label class="form-check-label" for="admob_enabled">Enable AdMob</label>
          </div>
          <div class="row g-2">
            <div class="col-md-6"><label class="form-label">App ID <span data-bs-toggle="tooltip" title="Get from AdMob dashboard."><i class="bi bi-info-circle"></i></span></label><input class="form-control" name="admob_app_id" value="{{ $setting->admob_app_id ?? '' }}"></div>
            <div class="col-md-6"><label class="form-label">Banner Unit ID</label><input class="form-control" name="admob_banner_id" value="{{ $setting->admob_banner_id ?? '' }}"></div>
            <div class="col-md-6"><label class="form-label">Interstitial Unit ID</label><input class="form-control" name="admob_interstitial_id" value="{{ $setting->admob_interstitial_id ?? '' }}"></div>
            <div class="col-md-6"><label class="form-label">Rewarded Unit ID</label><input class="form-control" name="admob_rewarded_id" value="{{ $setting->admob_rewarded_id ?? '' }}"></div>
          </div>
        </div>
        <div class="tab-pane fade" id="applovin" role="tabpanel">
          <div class="mb-2 form-check form-switch">
            <input class="form-check-input" type="checkbox" id="applovin_enabled" name="applovin_enabled" value="1" {{ ($setting->applovin_enabled ?? false) ? 'checked' : '' }}>
            <label class="form-check-label" for="applovin_enabled">Enable AppLovin</label>
          </div>
          <div class="row g-2">
            <div class="col-md-8"><label class="form-label">SDK Key <span data-bs-toggle="tooltip" title="Get from AppLovin dashboard."><i class="bi bi-info-circle"></i></span></label><input class="form-control" name="applovin_sdk_key" value="{{ $setting->applovin_sdk_key ?? '' }}"></div>
          </div>
        </div>
        <div class="tab-pane fade" id="ironsource" role="tabpanel">
          <div class="mb-2 form-check form-switch">
            <input class="form-check-input" type="checkbox" id="ironsource_enabled" name="ironsource_enabled" value="1" {{ ($setting->ironsource_enabled ?? false) ? 'checked' : '' }}>
            <label class="form-check-label" for="ironsource_enabled">Enable IronSource</label>
          </div>
          <div class="row g-2">
            <div class="col-md-8"><label class="form-label">App Key <span data-bs-toggle="tooltip" title="Get from IronSource dashboard."><i class="bi bi-info-circle"></i></span></label><input class="form-control" name="ironsource_app_key" value="{{ $setting->ironsource_app_key ?? '' }}"></div>
          </div>
        </div>
        <div class="tab-pane fade" id="unitymax" role="tabpanel">
          <div class="mb-2 form-check form-switch">
            <input class="form-check-input" type="checkbox" id="unitymax_enabled" name="unitymax_enabled" value="1" {{ ($setting->unitymax_enabled ?? false) ? 'checked' : '' }}>
            <label class="form-check-label" for="unitymax_enabled">Enable Unity MAX</label>
          </div>
          <div class="row g-2">
            <div class="col-md-8"><label class="form-label">Game ID <span data-bs-toggle="tooltip" title="Get from Unity dashboard."><i class="bi bi-info-circle"></i></span></label><input class="form-control" name="unity_game_id" value="{{ $setting->unity_game_id ?? '' }}"></div>
          </div>
        </div>
        <div class="tab-pane fade" id="leadbolt" role="tabpanel">
          <div class="mb-2 form-check form-switch">
            <input class="form-check-input" type="checkbox" id="leadbolt_enabled" name="leadbolt_enabled" value="1" {{ ($setting->leadbolt_enabled ?? false) ? 'checked' : '' }}>
            <label class="form-check-label" for="leadbolt_enabled">Enable Leadbolt</label>
          </div>
          <div class="row g-2">
            <div class="col-md-8"><label class="form-label">API Key <span data-bs-toggle="tooltip" title="Get from Leadbolt dashboard."><i class="bi bi-info-circle"></i></span></label><input class="form-control" name="leadbolt_api_key" value="{{ $setting->leadbolt_api_key ?? '' }}"></div>
          </div>
        </div>
        <div class="tab-pane fade" id="adpushup" role="tabpanel">
          <div class="mb-2 form-check form-switch">
            <input class="form-check-input" type="checkbox" id="adpushup_enabled" name="adpushup_enabled" value="1" {{ ($setting->adpushup_enabled ?? false) ? 'checked' : '' }}>
            <label class="form-check-label" for="adpushup_enabled">Enable AdPushup</label>
          </div>
          <div class="row g-2">
            <div class="col-md-8"><label class="form-label">Site ID <span data-bs-toggle="tooltip" title="Get from AdPushup dashboard."><i class="bi bi-info-circle"></i></span></label><input class="form-control" name="adpushup_site_id" value="{{ $setting->adpushup_site_id ?? '' }}"></div>
          </div>
        </div>
        <div class="tab-pane fade" id="smartyads" role="tabpanel">
          <div class="mb-2 form-check form-switch">
            <input class="form-check-input" type="checkbox" id="smartyads_enabled" name="smartyads_enabled" value="1" {{ ($setting->smartyads_enabled ?? false) ? 'checked' : '' }}>
            <label class="form-check-label" for="smartyads_enabled">Enable SmartyAds</label>
          </div>
          <div class="row g-2">
            <div class="col-md-8"><label class="form-label">App ID <span data-bs-toggle="tooltip" title="Get from SmartyAds dashboard."><i class="bi bi-info-circle"></i></span></label><input class="form-control" name="smartyads_app_id" value="{{ $setting->smartyads_app_id ?? '' }}"></div>
          </div>
        </div>
        <div class="tab-pane fade" id="medianet" role="tabpanel">
          <div class="mb-2 form-check form-switch">
            <input class="form-check-input" type="checkbox" id="medianet_enabled" name="medianet_enabled" value="1" {{ ($setting->medianet_enabled ?? false) ? 'checked' : '' }}>
            <label class="form-check-label" for="medianet_enabled">Enable Media.net</label>
          </div>
          <div class="row g-2">
            <div class="col-md-8"><label class="form-label">Site ID <span data-bs-toggle="tooltip" title="Get from Media.net dashboard."><i class="bi bi-info-circle"></i></span></label><input class="form-control" name="medianet_site_id" value="{{ $setting->medianet_site_id ?? '' }}"></div>
          </div>
        </div>
        <div class="tab-pane fade" id="appodeal" role="tabpanel">
          <div class="mb-2 form-check form-switch">
            <input class="form-check-input" type="checkbox" id="appodeal_enabled" name="appodeal_enabled" value="1" {{ ($setting->appodeal_enabled ?? false) ? 'checked' : '' }}>
            <label class="form-check-label" for="appodeal_enabled">Enable Appodeal</label>
          </div>
          <div class="row g-2">
            <div class="col-md-8"><label class="form-label">App Key <span data-bs-toggle="tooltip" title="Get from Appodeal dashboard."><i class="bi bi-info-circle"></i></span></label><input class="form-control" name="appodeal_app_key" value="{{ $setting->appodeal_app_key ?? '' }}"></div>
          </div>
        </div>
        <div class="tab-pane fade" id="adpumb" role="tabpanel">
          <div class="mb-2 form-check form-switch">
            <input class="form-check-input" type="checkbox" id="adpumb_enabled" name="adpumb_enabled" value="1" {{ ($setting->adpumb_enabled ?? false) ? 'checked' : '' }}>
            <label class="form-check-label" for="adpumb_enabled">Enable AdPumb</label>
          </div>
          <div class="row g-2">
            <div class="col-md-8"><label class="form-label">App Key <span data-bs-toggle="tooltip" title="Get from AdPumb dashboard."><i class="bi bi-info-circle"></i></span></label><input class="form-control" name="adpumb_app_key" value="{{ $setting->adpumb_app_key ?? '' }}"></div>
          </div>
        </div>
        <div class="tab-pane fade" id="cas" role="tabpanel">
          <div class="mb-2 form-check form-switch">
            <input class="form-check-input" type="checkbox" id="cas_enabled" name="cas_enabled" value="1" {{ ($setting->cas_enabled ?? false) ? 'checked' : '' }}>
            <label class="form-check-label" for="cas_enabled">Enable CAS</label>
          </div>
          <div class="row g-2">
            <div class="col-md-8"><label class="form-label">App Key <span data-bs-toggle="tooltip" title="Get from CAS dashboard."><i class="bi bi-info-circle"></i></span></label><input class="form-control" name="cas_app_key" value="{{ $setting->cas_app_key ?? '' }}"></div>
          </div>
        </div>
      </div>
      <div class="col-12 d-flex gap-2 mt-4">
        <button class="btn btn-primary" type="submit"><i class="bi bi-save"></i> Save</button>
      </div>
    </form>
  </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
  tooltipTriggerList.forEach(function (tooltipTriggerEl) {
    new bootstrap.Tooltip(tooltipTriggerEl);
  });
});
</script>
@endsection


