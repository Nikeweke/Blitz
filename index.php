<?php

 // local or server
define("MODE_DB", 'local');
// define("MODE_DB", 'server');

// Setup Slim
require 'settings/bootstrap.php';

$app->run();
