<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'locale_id'         => 1,
            'name'              => 'Larabase',
            'last_name'         => 'Admin',
            'email_verified_at' => now(),
            'email'             => 'admin@larabase.com',
            'password'          => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', //password
            'preferred_theme'   => 'light',
            'is_active'         => true,
            'is_admin'          => true,
        ]);

        User::factory()->count(50)->create();
    }
}
