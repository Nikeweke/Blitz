<?php

namespace App\Controllers\Graphql;

use GraphQL\Type\Definition\Type;

class Mutation {

  public static function get () {
    return [
        'name' => 'Calc',
        'fields' => [
            'sum' => [
                'type' => Type::int(),
                'args' => [
                    'x' => ['type' => Type::int()],
                    'y' => ['type' => Type::int()],
                ],
                'resolve' => function ($root, $args) {
                    return $args['x'] + $args['y'];
                },
            ],
        ],
    ];
  }

}
