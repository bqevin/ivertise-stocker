<?php
/*
*Author: Kevin Barasa
*Phone : +254724778017
*Email
 : kevin.barasa001@gmail.com
*/
class Cookie
{
    //Checks if the cookie has been set/exists
    public static function exists($name){
        return (isset($_COOKIE[$name])) ? true : false;
    }
    //Gets the cookie by name
    public static function get($name){
        return $_COOKIE[$name];
    }
    //Sets cookie
    public static function put($name, $value, $expiry){
        if (setcookie($name, $value, time()+$expiry, '/')) {
            return true;
        }
        return false;
    }
    //flashes cookie out
    public static function delete($name){
        self::put($name, '', time() - 1);
    }
}