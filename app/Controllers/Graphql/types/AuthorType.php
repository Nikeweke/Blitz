<?php

namespace App\Controllers\Graphql\types;

use GraphQL\Type\Definition\{ ObjectType, Type };

class AuthorType {

  public static function get () {
    return new ObjectType([
        'name' => 'Author',
        'description' => 'Author type for books',
        'fields' => [
            'id'   => Type::id(),
            'name' => Type::string(),
            'age'  => Type::int(),
            // 'books' => 
        ]
    ]);
  }
}
