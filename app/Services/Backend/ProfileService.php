<?php

namespace App\Services\Backend;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfileService
{

    public function update(array $profileData): User
    {
        $user = auth()->user();

        $user->update([
            'locale_id' => $profileData['locale_id'] ?? $user->locale_id,
            'name'      => $profileData['name'] ?? $user->name,
            'last_name' => $profileData['last_name'] ?? $user->last_name,
            'email'     => $profileData['email'] ?? $user->email,
        ]);

        return $user;
    }

    public function updatePhoto(array $profileData): User
    {
        $user = auth()->user();

        storeMedia('users', $user, $profileData['photo']);

        return $user;
    }

    public function updatePassword(array $profileData): User
    {
        $user = auth()->user();

        $user->update([
            'password' => Hash::make($profileData['password'])
        ]);

        return $user;
    }

}
