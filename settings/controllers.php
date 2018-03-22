<?php
/*
*  controllers.php
*
*  Регистрируем контроллеры (Подлючение идет автоматом через composer: psr-4 autoload)
*/

use \App\Controllers\{
                       HomeController as HomeCtrl,
                       ApiController  as ApiCtrl
                    };

// $c - содержит подключение к БД
$container['HomeController'] =  new HomeCtrl($DB);  // pass DB - HomeCtrl($DB)
$container['ApiController']  =  new ApiCtrl();
