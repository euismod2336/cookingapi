<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredientSeeder extends Seeder
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
                'name' => 'Knoflook',
                'amount' => '2 teentjes'
            ],
            [
                'name' => 'Rode ui',
                'amount' => '1'
            ],
            [
                'name' => 'Ui',
                'amount' => 'meh'
            ],
            [
                'name' => 'Paprika',
                'amount' => '1 gele, 1 rode'
            ],
        ];

        foreach ($ingredients as $ingredient) {
            $item = \App\Models\Ingredient::create(['name' => $ingredient['name']]);

            DB::table('ingredient_recipe')->insert([
                'ingredient_id' => $item->id,
                'recipe_id' => 1,
                'amount' => $ingredient['amount'],
            ]);
        }
    }
}
