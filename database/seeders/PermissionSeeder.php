<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            // Users
            [
                'category' => 'backend.users',
                'name'     => 'backend.list_users',
                'code'     => 'list_users',
            ],
            [
                'category' => 'backend.users',
                'name'     => 'backend.create_users',
                'code'     => 'create_users',
            ],
            [
                'category' => 'backend.users',
                'name'     => 'backend.view_users',
                'code'     => 'view_users',
            ],
            [
                'category' => 'backend.users',
                'name'     => 'backend.edit_users',
                'code'     => 'edit_users',
            ],
            [
                'category' => 'backend.users',
                'name'     => 'backend.delete_users',
                'code'     => 'delete_users',
            ],
            // Roles
            [
                'category' => 'backend.roles',
                'name'     => 'backend.list_roles',
                'code'     => 'list_roles',
            ],
            [
                'category' => 'backend.roles',
                'name'     => 'backend.create_roles',
                'code'     => 'create_roles',
            ],
            [
                'category' => 'backend.roles',
                'name'     => 'backend.view_roles',
                'code'     => 'view_roles',
            ],
            [
                'category' => 'backend.roles',
                'name'     => 'backend.edit_roles',
                'code'     => 'edit_roles',
            ],
            [
                'category' => 'backend.roles',
                'name'     => 'backend.delete_roles',
                'code'     => 'delete_roles',
            ],
            // Permissions
            [
                'category' => 'backend.permissions',
                'name'     => 'backend.list_permissions',
                'code'     => 'list_permissions',
            ],
            [
                'category' => 'backend.permissions',
                'name'     => 'backend.create_permissions',
                'code'     => 'create_permissions',
            ],
            [
                'category' => 'backend.permissions',
                'name'     => 'backend.view_permissions',
                'code'     => 'view_permissions',
            ],
            [
                'category' => 'backend.permissions',
                'name'     => 'backend.edit_permissions',
                'code'     => 'edit_permissions',
            ],
            [
                'category' => 'backend.permissions',
                'name'     => 'backend.delete_permissions',
                'code'     => 'delete_permissions',
            ],
            // Settings
            [
                'category' => 'backend.settings',
                'name'     => 'backend.edit_settings',
                'code'     => 'edit_settings',
            ],
        ];

        Permission::insert($permissions);
    }
}
