<?php

namespace App\Controllers;

// Models
// use App\Models\User;

class HomeController extends Controller {


   private $db;

   public function __construct($db){
     // $this->db = $db;   // set db connection into class field
   }


   /*
   |--------------------------------------------------------------------------
   |  Главная страница {GET}   /
   |--------------------------------------------------------------------------
   */
   public function Index($request, $response, $args){
     include 'views/welcome.php';
   }


  

}
