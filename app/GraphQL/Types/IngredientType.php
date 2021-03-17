<?php
declare(strict_types=1);

namespace App\GraphQL\Types;

use App\Models\Ingredient;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class IngredientType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Ingredient',
        'model' => Ingredient::class,
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::int()
            ],
            'name' => [
                'type' => Type::string()
            ],
            'amount' => [
                'type' => Type::string(),
                'selectable' => false,
                'resolve' => function ($recipe) {
                    return object_get($recipe, 'pivot.amount');
                },
            ]
        ];
    }
}
