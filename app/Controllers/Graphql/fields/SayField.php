<?php

namespace App\Controllers\Graphql\fields;

use GraphQL\Type\Definition\Type;

class SayField {

  public static function get () {
    return [
            'type' => Type::string(),

            'args' => [
                'message' => ['type' => Type::string()],
            ],

            'resolve' => function ($root, $args) {
                return  $root['prefix'] . $args['message'];
            }
    ];
  }

}
