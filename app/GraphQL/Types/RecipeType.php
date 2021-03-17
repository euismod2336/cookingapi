<?php
declare(strict_types=1);

namespace App\GraphQL\Types;

use App\Models\Recipe;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
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
            'image'     => [
                'type' => Type::string()
            ],
            'description'     => [
                'type' => Type::string()
            ],
            'amount_people'     => [
                'type' => Type::int()
            ],
            'rating'     => [
                'type' => Type::int()
            ],
            'effort'     => [
                'type' => Type::int()
            ],
            'time'     => [
                'type' => Type::string()
            ],
            'instructions'     => [
                'type' => Type::string()
            ],
            'type'     => [
                'type' => Type::string()
            ],
            'flavor_profile'     => [
                'type' => Type::string()
            ],
            'ingredients' => [
                'type' => Type::listOf(GraphQL::type('ingredient'))
            ],
            'country' => [
                'type' => GraphQL::type('country')
            ]
        ];
    }
}
