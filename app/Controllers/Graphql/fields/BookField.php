<?php

namespace App\Controllers\Graphql\fields;

use GraphQL\Type\Definition\Type;
use App\Controllers\Graphql\TestData;
use App\Controllers\Graphql\types\TypesRegistry;  // custom types

class BookField {

  /*
  |----------------------------------------------------------
  | Get just a Book by ID + Author
  |----------------------------------------------------------
  */
  public static function get () {

    // get test data as some of books
    $books = TestData::get('books');

    return [
            'type' => TypesRegistry::BookType(),

            'args' => [
                'id' => [ 'type' => Type::int() ],
            ],

            'resolve' => function ($root, $args) use ($books) {
                $arrIds = array_column($books, 'id');         // get from all items ID and make new array of its IDs
                $index = array_search($args['id'], $arrIds);  // get index of item in array
                return $books[$index];
            }
    ];
  }



  /*
  |----------------------------------------------------------
  | Get list of Books
  |----------------------------------------------------------
  */
  public static function getList () {

    // get test data as some of books
    $books = TestData::get('books');

    return [
            'type' => Type::listOf( TypesRegistry::BookType() ),

            'resolve' => function ($root, $args) use ($books) {
                return $books;
            }
    ];
  }

}
