<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Recipe::create([
            'owner_id' => 1,
            'title' => 'seededRecipe',
            'description' => 'a recipe to test everything',
            'amount_people' => 2,
            'effort' => 2,
            'time' => '2 hour',
            'instructions' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus consequat, erat nec faucibus elementum, turpis felis venenatis dolor, nec pretium eros dui id nisl. Proin dolor libero, fringilla ultrices augue eu, iaculis condimentum justo. In tempor orci vitae lectus semper, ut auctor tortor fringilla. Suspendisse at ante sodales, consequat ipsum id, lobortis erat. Pellentesque ac arcu libero. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Fusce ut mauris ut ligula fringilla viverra vitae eget ex. Vestibulum volutpat dolor leo, ut vestibulum felis viverra eu.',
            'type' => 'hoofd',
            'country_id' => 1,
            'flavor_profile' => 'sweet, sour and roasty'
        ]);

        \App\Models\Recipe::create([
            'owner_id' => 1,
            'title' => 'seededRecipe 2',
            'description' => 'a second recipe to test everything',
            'amount_people' => 10,
            'effort' => 1,
            'time' => '2 hour',
            'instructions' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus consequat, erat nec faucibus elementum, turpis felis venenatis dolor, nec pretium eros dui id nisl. Proin dolor libero, fringilla ultrices augue eu, iaculis condimentum justo. In tempor orci vitae lectus semper, ut auctor tortor fringilla. Suspendisse at ante sodales, consequat ipsum id, lobortis erat. Pellentesque ac arcu libero. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Fusce ut mauris ut ligula fringilla viverra vitae eget ex. Vestibulum volutpat dolor leo, ut vestibulum felis viverra eu.',
            'type' => 'hoofd',
            'country_id' => 2,
            'flavor_profile' => 'sweet, sour and roasty'
        ]);
    }
}
