<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
            // Backend
            [
                'name'  => 'Records Per Page',
                'key'  => 'backend_records_per_page',
                'value' => '10',
            ],
            [
                'name'  => 'Records Per Page Options',
                'key'  => 'backend_records_per_page_options',
                'value' => '10,20,30,40,50,100',
            ],
            // Frontend
            [
                'name'  => 'Status',
                'key'  => 'frontend_status',
                'value' => 'active',
            ],
            [
                'name'  => 'Redirect To',
                'key'  => 'frontend_redirect_to',
                'value' => '',
            ]
        ];

        Setting::insert($settings);
    }
}
