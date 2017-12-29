<?php

// WEB
$app->get('/',   'HomeController:Index');


// API
$app->get(    '/t',  'ApiController:TestApi');
$app->post(   '/t',  'ApiController:TestApi');
$app->put(    '/t',  'ApiController:TestApi');
$app->delete( '/t',  'ApiController:TestApi');
