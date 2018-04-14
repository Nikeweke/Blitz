<?php

namespace App\Controllers\Graphql\types;

use GraphQL\Type\Definition\{ ObjectType, Type };
use App\Controllers\Graphql\types\AuthorType;
use App\Controllers\Graphql\TestData;

class BookType {

  public static function get (): ObjectType {

    $authors = TestData::get('authors');

    return new ObjectType([
        'name' => 'Book',
        'description' => 'Book type and thats all',
        'fields' => [
            'id'        => Type::id(),
            'title'     => Type::string(),
            'genre'     => Type::string(),
            'author_id' => Type::int(),

            'author'    => [
               'type'    => AuthorType::get(),

               'resolve' => function($root, $args) use ($authors) {
                 $arrIds = array_column($authors, 'id');         // get from all items ID and make new array of its IDs
                 $index = array_search($root['author_id'], $arrIds);  // get index of item in array
                 return $authors[$index];
               }
            ],
        ]
    ]);
  }
}
