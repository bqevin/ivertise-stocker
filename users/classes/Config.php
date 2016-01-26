<?php
/*
*Author: Kevin Barasa
*Phone : +254724778017
*Email : kevin.barasa001@gmail.com
*/
class Config {
    public static function get($path = null){
        if ($path) {
            $config = $GLOBALS['config'];
            $path = explode('/', $path);
            //print_r($path);
            foreach ($path as $bit) {
                if(isset($config[$bit])){
                    //sets $bit as $config
                    $config = $config[$bit];
                }
            }
            return $config;
        }
        return false;
    }
}

/*DB::stdClass Complete as at 23/01/2015 06:40:08 PM
*Signed : Kevin Barasa(Author)
*/