<?php

namespace App\GraphQL\Mutations;

use App\Models\Recipe;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class RecipeMutation extends Mutation
{
    protected $attributes = [
        'name' => 'recipe'
    ];

    public function type(): Type
    {
        return GraphQL::type('recipe');
    }

    public function args(): array
    {
        return [
            'recipe' => [
                'name' => 'recipe',
                'type' => GraphQL::type('recipeInput'),
                'rules' => ['required']
            ],
            'ingredients' => [
                'name' => 'ingredients',
                'type' => Type::listOf(GraphQL::type('ingredientInput')),
            ]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        //$input = collect($args['input']);

        return Recipe::find('1');
    }
}
