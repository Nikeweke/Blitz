<?php
/*
*   Mutation.php
*
*   contains a functions(mutations) for graphQl
*/
namespace App\Controllers\Graphql;

use GraphQL\Type\Definition\Type;

class Mutation {

  public static function get () {
    return [
        'name' => 'Mutation',

        'fields' => [

            // example of call: mutation { sum(x: 2, y: 2) }
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
