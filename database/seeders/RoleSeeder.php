<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder {

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        $roles = [
            [
                'name' => 'Tech Lead',
            ],
            [
                'name' => 'Project Manager',
            ],
            [
                'name' => 'Software Developer',
            ],
        ];

        Role::insert($roles);
    }
}
