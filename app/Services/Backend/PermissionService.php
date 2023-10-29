<?php

namespace App\Services\Backend;

use App\Models\Permission;

class PermissionService
{

    public function store(array $permissionData): Permission
    {
        $permission = Permission::create([
            'category' => $permissionData['category'],
            'name'     => $permissionData['name'],
            'code'     => $permissionData['code'],
        ]);

        return $permission;
    }

    public function update(array $permissionData, $permission): Permission
    {
        $permission->update([
            'category' => $permissionData['category'] ?? $permission->category,
            'name'     => $permissionData['name'] ?? $permission->name,
            'code'     => $permissionData['code'] ?? $permission->code,
        ]);

        return $permission;
    }
}
