<?php

namespace App\GraphQL\InputObject;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\InputType;

class RecipeInput extends InputType
{
    protected $attributes = [
        'name' => 'recipeInput'
    ];

    public function fields(): array
    {
        return [
            'title' => [
                'name' => 'title',
                'type' => Type::string(),
                'rules' => [
                    'required',
                ]
            ],
        ];
    }
}
