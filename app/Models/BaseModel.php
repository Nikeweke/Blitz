<?php
/*
*   BaseModel.php
*
*   contains common methods for models
*/

namespace App\Models;

class BaseModel {

     /*
     |--------------------------------------------------------------------------
     |  Забрать данные из запроса
     |--------------------------------------------------------------------------
     */
     public function getData($data){

        $rez = [];

        foreach ($data as $value) {
           array_push($rez, $value);
         }

         return $rez;
     }

}
