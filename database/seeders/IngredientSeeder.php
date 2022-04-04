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
            [
                'name' => 'Gember',
                'amount' => '2 cm'
            ],
            [
                'name' => 'Kurkuma',
                'amount' => '1 el'
            ],
            [
                'name' => 'Silvervlies uitjes',
                'amount' => '3 stuks'
            ],
        ];

        foreach ($ingredients as &$ingredient) {
            $item = \App\Models\Ingredient::create(['name' => $ingredient['name']]);
            $ingredient['id'] = $item->id;

            DB::table('ingredient_recipe')->insert([
                'ingredient_id' => $ingredient['id'],
                'recipe_id' => 1,
                'amount' => $ingredient['amount'],
            ]);
        }

        shuffle($ingredients);
        $ingredients = array_slice($ingredients, 0, 3);

        foreach ($ingredients as $ingredient) {
            DB::table('ingredient_recipe')->insert([
                'ingredient_id' => $ingredient['id'],
                'recipe_id' => 2,
                'amount' => $ingredient['amount'],
            ]);
        }
    }
}
