<?php

use App\Models\Setting;
use App\Models\TemporaryFile;

function storeMedia($mediaCollection, $model, $fileName)
{
    $temporaryFile = TemporaryFile::where('folder', $fileName)->first();

    if ($temporaryFile) {
        $model->addMedia(storage_path("app/public/photos/tmp/$fileName/$temporaryFile->name"))->toMediaCollection($mediaCollection);

        rmdir(storage_path("app/public/photos/tmp/$fileName"));

        $temporaryFile->delete();
    }
}

function getSetting($settingKey)
{
    // Define a unique cache key for this setting
    $cacheKey = 'setting_' . $settingKey;

    // Check if the setting is available in the cache
    $setting = Cache::get($cacheKey);

    if (!$setting) {
        // If the setting is not in the cache, fetch it from the database
        $setting = Setting::where('key', $settingKey)->first()->value;

        // Cache the setting for future use with an appropriate expiration time
        Cache::put($cacheKey, $setting, 1440); // Adjust the expiration time as needed
    }

    return $setting;
}
