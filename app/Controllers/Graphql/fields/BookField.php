<?php

namespace App\Controllers\Graphql\fields;

use GraphQL\Type\Definition\Type;
use App\Controllers\Graphql\types\BookType;
use App\Controllers\Graphql\TestData;

class BookField {

  public static function get () {

    // get test data as some of books
    $books = TestData::get('books');

    return [
            'type' => BookType::get(),

            'args' => [
                'id' => ['type' => Type::int()],
            ],

            'resolve' => function ($root, $args) use ($books) {
                $arrIds = array_column($books, 'id');         // get from all items ID and make new array of its IDs
                $index = array_search($args['id'], $arrIds);  // get index of item in array
                return $books[$index];
            }
    ];
  }


  public static function getList () {

    // get test data as some of books
    $books = TestData::get('books');

    return [

            'type' => Type::listOf( new BookType() ),

            'resolve' => function ($root, $args) use ($books) {
                return $books[$index];
            }
    ];
  }

}
