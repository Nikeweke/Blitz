## Template project with Slim-php
* `vendor = 784 kb`
* `all - 1.5 mb`

Tutorial - https://www.youtube.com/watch?v=b25xUNq_UOk

### Quick Start
###### index.php
```php
<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';
$app = new \Slim\App;

$app->get('/', function(Request $request, Response $response){
  echo "hello";
});


$app->run();
```


###### .htaccess - makes routing work on a server
```
DirectoryIndex index.php

RewriteEngine on
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond $1 !^(index\.php|public|images|css|js|robots\.txt)

RewriteRule ^(.*)$ index.php?/$1 [L]
```


### Autoload of namespaces
###### composer.json
**App** - это пространство которому будет соответствовать папка `app`, и будет подгружать запрошенные классы автоматом без `spl_autoload_register`
```json
{
    "require": {
        "slim/slim": "3.0"
    },

    "autoload": {
        "psr-4": {
          "App\\": "app"
        }
    }
}

```

```batch
composer dump-autoload -o
```

###### index.php
```php
// example
<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';

// Настройки Slim
$config['displayErrorDetails']    = true;  // показывает подробности об ошибке
// $config['addContentLengthHeader'] = false; // dont know what is it

// БД данные
$config['db']['host']   = 'localhost';
$config['db']['user']   = 'root';
$config['db']['pass']   = '';
$config['db']['dbname'] = 'test';

// Создаем приложение
$app = new \Slim\App(['settings' => $config]);

// path: ./app/controllers/HomeController.php
$ctrl = new \App\Controllers\HomeController();
```


### CORS solve troubles if use frontend
It can be solved with **CORS Everywhere** in firefox, and similar adds in other browsers
