<?php
// Регистрируем контроллеры (Подлючение идет автоматом через composer: psr-4 autoload)
use \App\Controllers\{
                       HomeController,
                       ApiController
                    };


$container['HomeController']    = function($c){   return new HomeController($c);   };    // $c - содержит подключение к БД
$container['ApiController']     = function($c){   return new ApiController();      };
