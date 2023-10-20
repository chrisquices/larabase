<?php

namespace Database\Seeders;

use App\Models\Locale;
use Illuminate\Database\Seeder;

class LocaleSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locales = [
            [
                'name' => 'English',
                'code' => 'en',
            ],
            [
                'name' => 'Español',
                'code' => 'es',
            ],
        ];

        Locale::insert($locales);
    }
}
