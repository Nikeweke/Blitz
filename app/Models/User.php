<?php
/*
*   User.php
*
*   model of table 'users'
*/

namespace App\Models;

class User extends BaseModel {

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
