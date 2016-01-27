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
        'db' => 'ivertise_africa'
        ),
    'remember' => array(
        'cookie_name' => 'hash',
        'cookie_expiry' => 604800 //10 Minutes
        ),
    'session' => array(
        'session_name' => 'user',
        'token_name' => 'token'
        )
    );

//
spl_autoload_register(function($class){
require_once 'classes/'.$class.'.php';
});

require_once 'functions/sanitize.php';

//This part::Initiallize Autologin based on set remember me ***Cookies magic
if (Cookie::exists(Config::get('remember/cookie_name')) && !Session::exists(Config::get('session/session_name'))) {
    //echo "User asked to be remembered";
    $hash = Cookie::get(Config::get('remember/cookie_name'));
    $hashCheck = DB::getInstance()->get('users_session', array('hash', '=', $hash));
    //If hash exists in DB, user_id is fetched
    if ($hashCheck->count()) {
        //echo "Hash Matches, Log user in";
        $user = new User($hashCheck->first()->user_id);
        $user->login(); //NB: not perfectly logging in despite everything being right. Resolution:Sought later
        //echo $hashCheck->first()->user_id;
    }
}