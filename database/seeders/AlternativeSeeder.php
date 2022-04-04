<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlternativeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ingredients = [
            [
                'ingredient_id' => '5',
                'alternative_id' => '1',
                'recipe_id' => '1',
                'amount' => '20cm'
            ],
            [
                'ingredient_id' => '6',
                'alternative_id' => '1',
                'recipe_id' => '2',
                'amount' => '5 el'
            ],
        ];

        foreach ($ingredients as &$ingredient) {
            DB::table('ingredient_recipe')->insert([
                'ingredient_id' => $ingredient['ingredient_id'],
                'recipe_id' => $ingredient['recipe_id'],
                'alternative_id' => $ingredient['alternative_id'],
                'amount' => $ingredient['amount'],
            ]);
        }
    }
}
