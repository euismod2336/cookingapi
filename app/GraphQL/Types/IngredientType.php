<?php
declare(strict_types=1);

namespace App\GraphQL\Types;

use App\Models\Ingredient;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
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
            'alternative' => [
                'type' => Type::int(),
                'selectable' => false,
                'resolve' => fn($recipe) => object_get($recipe, 'pivot.alternative_id'),
            ],
            'amount' => [
                'type' => Type::string(),
                'selectable' => false,
                'resolve' => fn($recipe) => object_get($recipe, 'pivot.amount'),
            ],
            'description' => [
                'type' => Type::string(),
                'selectable' => false,
                'resolve' => fn($recipe) => object_get($recipe, 'pivot.description'),
            ]
        ];
    }
}
