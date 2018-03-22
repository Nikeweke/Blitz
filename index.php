<?php
/*
*  index.php
*
*  Входная точка приложения
*/

 // local or server
define('MODE_DB', false);
// define("MODE_DB", 'local');
// define("MODE_DB", 'server');

// Setup app and up
require 'settings/bootstrap.php';

$app->run();
