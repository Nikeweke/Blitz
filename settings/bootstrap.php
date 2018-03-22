<?php
/*
*  bootstrap.php
*
*  Здесь все подключаеться и запускаеться приложение
*/

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require  'vendor/autoload.php';     // подгрузка пакетов
include  'settings/database.php';  // БД класс
include  'settings/helpers.php';   // Воспомогательные функции

// Настройки Slim
$config['displayErrorDetails'] = true;  // показывает подробности об ошибке

// Создаем приложение
$app = new \Slim\App(['settings' => $config]);
$container = $app->getContainer();

// Устанавливаем подключение
if (MODE_DB) {
  $DB = new Database();
} else {
  $DB = 'Database is turned off. To turn on go to "./index.php"';
}

// регистрация контроллеров
require 'settings/controllers.php';

// маршруты
require 'routes/web.php';
require 'routes/api.php';
