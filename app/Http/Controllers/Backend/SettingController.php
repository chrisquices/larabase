<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\SettingUpdateRequest;
use App\Services\Backend\SettingService;

class
SettingController extends Controller
{

    public function index()
    {
        return view('backend.settings.index');
    }

    public function update(SettingUpdateRequest $request, SettingService $settingService)
    {
        $settingService->update($request->validated());

        session()->flash('success', __('backend.settings_updated_successfully'));

        return back();
    }

}
