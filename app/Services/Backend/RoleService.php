<?php

namespace App\Services\Backend;

use App\Models\Role;

class RoleService
{

    public function store(array $roleData): Role
    {
        $role = Role::create([
            'name' => $roleData['name'],
        ]);

        $role->permissions()->sync($roleData['permission_ids'] ?? []);

        return $role;
    }

    public function update(array $roleData, $role): Role
    {
        $role->update([
            'name' => $roleData['name'] ?? $role->name,
        ]);

        $role->permissions()->sync($roleData['permission_ids'] ?? []);

        return $role;
    }
}
