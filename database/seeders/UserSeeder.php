<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create(
            [
                'id' => 0,
                'name' => 'System',
                'email' => 'system@cooking.nl',
                'password' => '123-fake',
            ]
        );
    }
}
