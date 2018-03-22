<?php
/*
*  api.php
*
*  Api routes
*/

// ApiController
$app->get( '/test/{id}', 'ApiController:TestParams');
$app->any( '/t',  'ApiController:TestApi');
