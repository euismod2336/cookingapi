<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = [
            'Nederland', 'Duitsland', 'Japan', 'Indonesie', 'Azie', 'India', 'Korea'
        ];

        foreach ($countries as $country) {
            \App\Models\Country::create(['name' => $country]);
        }

    }
}
