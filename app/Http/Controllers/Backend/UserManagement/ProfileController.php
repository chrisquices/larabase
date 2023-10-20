<?php

namespace App\Http\Controllers\Backend\UserManagement;

use App\Http\Controllers\Backend\Controller;
use App\Http\Requests\Backend\UserManagement\ProfilePasswordUpdateRequest;
use App\Http\Requests\Backend\UserManagement\ProfileUpdatePhotoRequest;
use App\Http\Requests\Backend\UserManagement\ProfileUpdateRequest;
use App\Models\Locale;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    public function index()
    {
        $user = auth()->user();
        $locales = Locale::all();

        return view('backend.user-management.profile.index', compact('user', 'locales'));
    }

    public function update(ProfileUpdateRequest $request)
    {
        $user = auth()->user();

        $user->update([
            'locale_id' => $request->locale_id,
            'name'      => $request->name,
            'last_name' => $request->last_name,
            'email'     => $request->email,
        ]);

        session()->flash('success', __('backend.profile_updated_successfully'));

        return back();
    }

    public function updatePhoto(ProfileUpdatePhotoRequest $request)
    {
        $user = auth()->user();

        storeMedia('users', $user, $request->photo);

        session()->flash('success', __('backend.profile_photo_updated_successfully'));

        return to_route('backend.user-management.profile.index');
    }

    public function updatePassword(ProfilePasswordUpdateRequest $request)
    {
        $user = auth()->user();
        $user->password = Hash::make($request->password);
        $user->save();

        session()->flash('success', __('backend.password_updated_successfully'));

        return to_route('backend.user-management.profile.index');
    }

}
