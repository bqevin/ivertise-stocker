<?php
/*
*Author: Kevin Barasa
*Phone : +254724778017
*Email : kevin.barasa001@gmail.com
*/
class Session{
    //Checks if session is inbound
    public static function exists($name){
        return(isset($_SESSION[$name]))? true : false;
    }

    //Sets session
    public static function put($name, $value){
        return $_SESSION[$name] = $value;
    }

    //Collects available session
    public static function get($name){
        return $_SESSION[$name];
    }

    //Delete Unused session
    public static function delete($name){
        if (self::exists($name)) {
            unset($_SESSION[$name]);
        }
    }

    //Gets session and success status. Deletes after being used
    public static function flash($name, $string = ''){
        if (self::exists($name)) {
            $session = self::get($name);
            self::delete($name);
            return $session;
        } else {
            self::put($name, $string);
        }
        //return '';
    }
}