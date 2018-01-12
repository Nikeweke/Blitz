<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


require  'vendor/autoload.php';     // подгрузка пакетов
// include  'settings/database.php';  // БД данные (Можно заремить если БД нет)
include  'settings/helpers.php';   // Воспомогательные функции


// Настройки Slim
$config['displayErrorDetails']    = true;  // показывает подробности об ошибке
// $config['addContentLengthHeader'] = false; // dont know what is it

// Создаем приложение
$app = new \Slim\App(['settings' => $config]);

// Получаем контейнер
$container = $app->getContainer();

// Устанавливаем подключение
if($db['host']){
  $container['db'] = function($c){
       $db = $c['settings']['db'];
       $pdo = new PDO('mysql:host=' . $db['host'] . ';dbname=' . $db['dbname'],  $db['user'], $db['pass']);
       $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
       return $pdo;
  };
}


require 'settings/controllers.php';    // регистрация контроллеров
require 'settings/routes.php';         // маршруты
