<?php
declare(strict_types=1);

namespace App\GraphQL\Types;

use App\Models\Recipe;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class RecipeType extends GraphQLType
{
    protected $attributes = [
        'name'  => 'Recipe',
        'model' => Recipe::class,
    ];

    public function fields(): array
    {
        return [
            'id'       => [
                'type' => Type::int()
            ],
            'title'     => [
                'type' => Type::string()
            ],
        ];
    }
}
