<?php
declare(strict_types=1);

namespace App\GraphQL\Types;

use App\Models\Ingredient;
use App\Models\Utensil;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class UtensilsType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Utensil',
        'model' => Utensil::class,
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::int()
            ],
            'name' => [
                'type' => Type::string()
            ]
        ];
    }
}
