<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\ProfilePasswordUpdateRequest;
use App\Http\Requests\Backend\ProfileUpdatePhotoRequest;
use App\Http\Requests\Backend\ProfileUpdateRequest;
use App\Models\Locale;
use App\Services\Backend\ProfileService;

class ProfileController extends Controller
{

    public function index()
    {
        $user = auth()->user();
        $locales = Locale::all();

        return view('backend.profile.index', compact('user', 'locales'));
    }

    public function update(ProfileUpdateRequest $request, ProfileService $profileService)
    {
        $profileService->update($request->validated());

        session()->flash('success', __('backend.profile_updated_successfully'));

        return back();
    }

    public function updatePhoto(ProfileUpdatePhotoRequest $request, ProfileService $profileService)
    {
        $profileService->updatePhoto($request->validated());

        session()->flash('success', __('backend.profile_photo_updated_successfully'));

        return to_route('backend.profile.index');
    }

    public function updatePassword(ProfilePasswordUpdateRequest $request, ProfileService $profileService)
    {
        $profileService->updatePassword($request->validated());

        session()->flash('success', __('backend.password_updated_successfully'));

        return to_route('backend.profile.index');
    }

}
