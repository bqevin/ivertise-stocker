<?php
/*
*Author: Kevin Barasa
*Phone : +254724778017
*Email : kevin.barasa001@gmail.com
*
*Purely for security
*SHA-256
*/
class Hash
{
    //Makes a sha265 salt
    public static function make($string, $salt = ''){
        //Makes a salt
        return hash('sha256', $string.$salt);
    }
    //salt the
    public static function salt($length){
        //Bring uniqueness/Rubbish/Strong salt
        return mcrypt_create_iv($length);
    }

    //
    public static function unique(){
        return self::make(uniqid());
    }
}