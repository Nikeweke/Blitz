<?php
/*
*   GraphQLController.php
*
*   contains basic example of usage GraphQL  (OPTIONAL FEATURE)
*/
namespace App\Controllers;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use GraphQL\Type\Schema;
use GraphQL\GraphQL;

class GraphQLController extends Controller {

    public function EntryPoint($request, $response, $args){
      try {
          // defining our ObjectType
          $queryType = new ObjectType([

              'name' => 'Query',

              'fields' => [
                  'echo' => [
                      'type' => Type::string(),
                      'args' => [
                          'message' => ['type' => Type::string()],
                      ],
                      'resolve' => function ($root, $args) {
                          return  $root['prefix'] . $args['message'];
                      }
                  ],
              ],
          ]);


          // defining mutation (function)
          $mutationType = new ObjectType([
              'name' => 'Calc',
              'fields' => [
                  'sum' => [
                      'type' => Type::int(),
                      'args' => [
                          'x' => ['type' => Type::int()],
                          'y' => ['type' => Type::int()],
                      ],
                      'resolve' => function ($root, $args) {
                          return $args['x'] + $args['y'];
                      },
                  ],
              ],
          ]);


          // See docs on schema options:
          // http://webonyx.github.io/graphql-php/type-system/schema/#configuration-options
          $schema = new Schema([
              'query' => $queryType,
              'mutation' => $mutationType,
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

          $rootValue = ['prefix' => 'You said: '];

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
