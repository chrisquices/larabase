<?php

namespace App\Services\Backend;

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

class SettingService
{

    public function update(array $settingsData)
    {
        foreach ($settingsData as $key => $settingData) {
            $setting = Setting::where('key', $key)->first();

            if ($setting) {
                $setting->update([
                    'value' => $settingData
                ]);
            }
        }

        $this->flushSettingsCache();
    }

    public function flushSettingsCache()
    {
        $settings = Setting::all();

        foreach ($settings as $setting) {
            Cache::forget("setting_$setting->key");
        }
    }
}
