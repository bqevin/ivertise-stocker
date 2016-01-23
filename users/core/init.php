<?php
/*
*Author: Kevin Barasa
*Phone : +254724778017
*Email : kevin.barasa001@gmail.com
*/
session_start();
/*
 *Registering all Global Requirements for the pages to execute in arrays
 *Calling is easy as Config::get('mysql/host') //127.0.0.1
 */
$GLOBALS['config'] = array(
    'mysql' => array(
        'host' => '127.0.0.1',
        'username' => 'root',
        'password' => 'password',
        'db' => 'oop'
        ),
    'remember' => array(
        'cookie_name' => 'hash',
        'cookie_expiry' => 604800
        ),
    'session' => array(
        'session_name' => 'user'
        )
    );

//
spl_autoload_register(function($class){
require_once 'classes/'.$class.'.php';
});

require_once 'functions/sanitize.php';