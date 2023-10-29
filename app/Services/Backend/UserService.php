<?php

namespace App\Services\Backend;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{

    public function store(array $userData): User
    {
        $user = User::create([
            'locale_id' => $userData['locale_id'],
            'name'      => $userData['name'],
            'last_name' => $userData['last_name'],
            'email'     => $userData['email'],
            'password'  => Hash::make($userData['password']),
            'is_active' => $userData['is_active'],
            'is_admin'  => $userData['is_admin'] ?? false,
        ]);

        $user->roles()->sync($userData['role_ids']);

        return $user;
    }

    public function update(array $userData, $user): User
    {
        $user->update([
            'locale_id' => $userData['locale_id'] ?? $user->locale_id,
            'name'      => $userData['name'] ?? $user->name,
            'last_name' => $userData['last_name'] ?? $user->last_name,
            'email'     => $userData['email'] ?? $user->email,
            'is_active' => $userData['is_active'] ?? $user->is_active,
            'is_admin'  => $userData['is_admin'] ?? $user->is_admin,
        ]);

        if ($userData['password']) $user->update(['password' => Hash::make($userData['password'])]);

        $user->roles()->sync($userData['role_ids'] ?? []);

        return $user;
    }
}
