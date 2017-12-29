<?php

// MODE_DB you can find in './index.php' just change it when push to server

if(MODE_DB == 'local'){
    // local
    $config['db']['host']   = 'localhost';
    $config['db']['user']   = 'root';
    $config['db']['pass']   = '';
    $config['db']['dbname'] = 'test';

} else{
    // server
    $config['db']['host']   = '';
    $config['db']['user']   = '';
    $config['db']['pass']   = '';
    $config['db']['dbname'] = '';
}
