<?php

namespace App\Controllers\Graphql;

class TestData {

  public static function get (string $data_name) : array {
    $books = [
      ['id' => 1, 'title' => 'Nigthmare',      'genre' => 'Horror',    'author_id' => 1 ],
      ['id' => 2, 'title' => 'Human on Earth', 'genre' => 'Fantastic', 'author_id' => 1 ],
      ['id' => 3, 'title' => 'Small dog',      'genre' => 'Adventure', 'author_id' => 2 ],
      ['id' => 4, 'title' => 'Three beardy',   'genre' => 'Comedy',    'author_id' => 1 ],
    ];

    $authors = [
      ['id' => 1, 'name' => 'Greensco', 'age' => 35],
      ['id' => 2, 'name' => 'Helly',    'age' => 40],
    ];

    // will return array by name thats above
    return $$data_name;
  }

}
