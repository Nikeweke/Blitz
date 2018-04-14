<?php
/*
*   GraphQLController.php
*
*   contains basic example of usage GraphQL  (OPTIONAL FEATURE)
*/
namespace App\Controllers;

use GraphQL\Type\Definition\{ ObjectType, Type };
use GraphQL\Type\Schema;
use GraphQL\GraphQL;

use App\Controllers\Graphql\types\BookType;

// mutation
use App\Controllers\Graphql\{Mutation, TestData};

// fields
use App\Controllers\Graphql\fields\{SayField, BookField, BooksField, AuthorField};

class GraphQLController extends Controller {

    public function EntryPoint ($request, $response, $args) {


      try {
          // defining our ObjectType
          $rootQuery = new ObjectType([
              'name' => 'rootQuery',
              'fields' => function(){
                return [
                  'say'    => SayField::get(),

                  'book'   => [
                          'type' => BookType::get(),

                          'args' => [
                              'id' => ['type' => Type::int()],
                          ],

                          'resolve' => function ($root, $args) {
                              $books = TestData::get('books');
                              $arrIds = array_column($books, 'id');         // get from all items ID and make new array of its IDs
                              $index = array_search($args['id'], $arrIds);  // get index of item in array
                              return $books[$index];
                          }
                  ],

                  'books'  => [
                          'type' => Type::listOf( BookType::get() ),

                          'resolve' => function ($root, $args) {
                              $books = TestData::get('books');
                              return $books[$index];
                          }
                  ],
               ];
              }
          ]);

          // defining mutation (function)
          $mutation = new ObjectType( Mutation::get() );

          // See docs on schema options:
          // http://webonyx.github.io/graphql-php/type-system/schema/#configuration-options
          $schema = new Schema([
              'query'    => $rootQuery,
              'mutation' => $mutation,
          ]);

          // get data  (example):
        //   {
        //   "operationName": null,
        //   "query": "query { echo (message: \"Hi there\") }",
        //   "variables": null
         // }
          $body = $request->getParsedBody();

          // get query and variables
          $query = $body['query'];
          $variableValues = isset($body['variables']) ? $body['variables'] : null;

          $rootValue = ['prefix' => 'You said: ']; // it is using in fields/Say.php

          $result = GraphQL::executeQuery($schema, $query, $rootValue, null, $variableValues);
          $output = $result->toArray();

      } catch (\Exception $e) {
          $output = [
              'error' => [
                  'message' => $e->getMessage()
              ]
          ];
      }

      header('Content-Type: application/json; charset=UTF-8');
      return json_encode($output);
    }

}
