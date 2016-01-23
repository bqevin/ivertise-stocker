<?php

/*
*Author: Kevin Barasa
*Phone : +254724778017
*Email : kevin.barasa001@gmail.com
*/

//Error display set to 1 for debugging. NB: Remember to disable
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'core/init.php';
//$user = DB::getInstance()->query("SELECT username FROM users WHERE username =?", array("Kevin"));
//$user = DB::getInstance()->get('users', array('username','=','Kevin'));
$user = DB::getInstance()->query("SELECT username FROM users");
if (!$user->count()) {
    echo "No User(s)!";
}else{
    //echo $user->first()->username;
    foreach ($user->results() as $user) {
        echo $user->username, '<br>';
    }
}

// $user->insert('users',array(
//     'username' => 'John',
//     'password' => 'password',
//     'salt' => 'salt'
//     ));

// $userUpdate = DB::getInstance()->update('users',4,array(
//     'password' => 'newPassword',
//     'name' => 'John Paul Karijo'
//     ));