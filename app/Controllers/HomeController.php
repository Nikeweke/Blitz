<?php

namespace App\Controllers;

// Models
use App\Models\User;

class HomeController extends Controller {


   private $db;

   public function __construct($container){
     $this->db = $container->db;   // set db connection into class field
   }


   /*
   |--------------------------------------------------------------------------
   |  Главная страница {GET}   /
   |--------------------------------------------------------------------------
   */
   public function Index($request, $response){

     $userModel = new User;
     $users = $userModel->get($this->db);

     // dd($users);

     include 'views/welcome.php';
   }

}
