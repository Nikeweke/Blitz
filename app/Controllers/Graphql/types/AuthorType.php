<?php

namespace App\Controllers\Graphql\types;

use GraphQL\Type\Definition\{ ObjectType, Type };
use App\Controllers\Graphql\TestData;
use App\Controllers\Graphql\types\TypesRegistry; // custom types

class AuthorType extends ObjectType {

  public function __construct () {

    $config = [
        'name' => 'Author',
        'description' => 'Author type for books',
        'fields' => [
            'id'   => Type::id(),
            'name' => Type::string(),
            'age'  => Type::int(),

            'books' => [
               'type'    => Type::listOf( TypesRegistry::BookType() ),
               'resolve' => function($root, $args) {
                 $books = TestData::get('books');
                 // $index = array_search($root['id'],  array_column($books, 'author_id'));  // get index of item in array
                 return $books;
               }
            ],
        ]
    ];

    parent::__construct($config);
  }

}
