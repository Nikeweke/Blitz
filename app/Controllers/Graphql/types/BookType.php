<?php

namespace App\Controllers\Graphql\types;

use GraphQL\Type\Definition\{ ObjectType, Type };
use App\Controllers\Graphql\TestData;
use App\Controllers\Graphql\types\TypesRegistry;  // custom types

class BookType extends ObjectType {

  public function __construct () {

    $config = [
        'name' => 'Book',
        'description' => 'Book type and thats all',
        'fields' => [
            'id'        => Type::id(),
            'title'     => Type::string(),
            'genre'     => Type::string(),
            'author_id' => Type::int(),


              // CANT ENABLE THIS FIELD CUZ OF MEMORY EXHAUSTED, not resolved YET  !!!!!!!

            // 'author'    => [
            //    'type'    => TypesRegistry::AuthorType(),
            //
            //    'resolve' => function($root, $args) {
            //      $authors = TestData::get('authors');
            //      $arrIds = array_column($authors, 'id');         // get from all items ID and make new array of its IDs
            //      $index = array_search($root['author_id'], $arrIds);  // get index of item in array
            //      return $authors[$index];
            //    }
            // ],
        ]
    ];

    parent::__construct($config);
  }

}
