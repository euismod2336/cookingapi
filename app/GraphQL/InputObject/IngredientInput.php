<?php

namespace App\GraphQL\InputObject;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\InputType;

class IngredientInput extends InputType
{
    protected $attributes = [
        'name' => 'ingredientInput'
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int(),
            ],
            'name' => [
                'name' => 'name',
                'type' => Type::string(),
            ],
            'amount' => [
                'name' => 'name',
                'type' => Type::string(),
            ],
        ];
    }
}
