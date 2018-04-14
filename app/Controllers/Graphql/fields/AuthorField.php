<?php

namespace App\Controllers\Graphql\fields;

use GraphQL\Type\Definition\Type;
use App\Controllers\Graphql\types\AuthorType;
use App\Controllers\Graphql\TestData;

class AuthorField {

  public static function get () {

    // get test data as some of authors
    $authors = TestData::get('authors');

    return [
            'type' => AuthorType::get(),

            'args' => [
                'id' => ['type' => Type::int()],
            ],

            'resolve' => function ($root, $args) use ($authors) {
                $arrIds = array_column($authors, 'id');         // get from all items ID and make new array of its IDs
                $index = array_search($args['id'], $arrIds);  // get index of item in array
                return $authors[$index];
            }
    ];
  }

}
