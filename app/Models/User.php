<?php
/*
*   User.php
*
*   model of table 'users'
*/

namespace App\Models;

class User extends BaseModel {

     public static function test(){
        echo 'sss';
     }

     /*
     |--------------------------------------------------------------------------
     |  Забрать всех пользователей
     |--------------------------------------------------------------------------
     */
     public function get($db){
           $data = $db->query('SELECT * FROM users');
           return $this->getData($data);
     }

}
