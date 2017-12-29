<?php

namespace App\Controllers;

// Models

class ApiController extends Controller {

   /*
   |--------------------------------------------------------------------------
   |  Test func {POST, PUT, DELETE}   /t
   |--------------------------------------------------------------------------
   */
   public function TestApi($request, $response){

    $data = [
       'message'      => 'hi there it is API method {GET, POST, PUT, DELETE}',
       'method'       => $request->getMethod(),
       'query'        => $request->getQueryParams(),
       'body'         => $request->getParsedBody(),
     ];

     echo json_encode($data);
   }

}
