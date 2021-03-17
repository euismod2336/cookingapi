<?php
declare(strict_types=1);

namespace App\GraphQL\Types;

use App\Models\Country;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class CountryType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Country',
        'model' => Country::class,
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
