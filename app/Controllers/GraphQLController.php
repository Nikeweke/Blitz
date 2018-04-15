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
use App\Controllers\Graphql\{Mutation, TestData};                         // mutation, test data
use App\Controllers\Graphql\fields\{ SayField, BookField, AuthorField }; // fields

class GraphQLController extends Controller {

    /*
    |----------------------------------------------------------
    | Входная точка для GraphQL обращений
    |----------------------------------------------------------
    */
    public function EntryPoint ($request, $response, $args) {

      try {
          // defining our ObjectType with fields that we can request to
          $rootQuery = new ObjectType([
              'name' => 'rootQuery',
              'fields' =>  [
                  'say'    => SayField::get(),
                  'book'   => BookField::get(),
                  'books'  => BookField::getList(),
                  'author' => AuthorField::get()
               ]
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
