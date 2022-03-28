<?php
declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\Models\Recipe;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class RecipesQuery
 *
 * eg. /graphql?query={recipes{image,title}}
 * eg. /graphql?query={recipes{image,title,ingredients{name,amount}}}
 *
 * @package App\GraphQL\Queries
 */
class RecipesQuery extends Query
{
    protected $attributes = [
        'name' => 'recipes'
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('recipe'));
    }

    public function args(): array
    {
        return [
            'id'   => [
                'name' => 'id',
                'type' => Type::int()
            ],
            'title' => [
                'name' => 'title',
                'type' => Type::string()
            ],
            'user_id' => [
                'name' => 'user_id',
                'type' => Type::int()
            ]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $fields = $getSelectFields();
        $args   = collect($args);

        $limit = $args->get('limit', 25);

        if ($limit > 50)
        {
            $limit = 50;
        }

        return Recipe::with($fields->getRelations())
            ->select($fields->getSelect())
            ->when($args->get('id'), fn(Builder $q) => $q->where('id', $args->get('id')))
            ->when($args->get('name'), fn(Builder $q) => $q->where('name', $args->get('name')))
            ->paginate($limit, ['*'], 'page', $args->get('page', 1));
    }
}
