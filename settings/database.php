<?php
/*
*  database.php
*
*  Класс для работы с БД
*/

// MODE_DB you can find in './index.php' just change it when push to server
class Database {

   public $pdo;

   /*
   |--------------------------------------------------------------------------
   |  __construct
   |--------------------------------------------------------------------------
   */
   public function __construct(){
     $this->pdo = $this->getPDO();
   }


   /*
   |--------------------------------------------------------------------------
   |  Получить массив данных для БД
   |--------------------------------------------------------------------------
   */
   public function getDBConfig(){

     if(MODE_DB == 'local'){
       $host   = 'localhost';
       $user   = 'root';
       $pass   = '';
       $dbname = 'test';

     // server
     } else{
       $host   = '';
       $user   = '';
       $pass   = '';
       $dbname = '';
     }

     return compact('host', 'user', 'pass', 'dbname');
   }


   /*
   |--------------------------------------------------------------------------
   |  Установить подключение к PDO и вернуть его
   |--------------------------------------------------------------------------
   */
   public  function getPDO(){
     // $db = $c['settings']['db'];
     $db = $this->getDBConfig();

     $pdo = new PDO('mysql:host=' . $db['host'] . ';dbname=' . $db['dbname'],  $db['user'], $db['pass']);
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
     return $pdo;
   }

}
