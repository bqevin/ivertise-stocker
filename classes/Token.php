<?php
/*
*Author: Kevin Barasa
*Phone : +254724778017
*Email : kevin.barasa001@gmail.com
*
*Protection against Cross Site Request Fogery (CSRF)
*/
class Token {
    //Quick md5 toekn binded with a key
    public static function generate(){
        //Returns a token name binded a md5
        return Session::put(Config::get('session/token_name'), md5(uniqid()));
    }

    //If token is there, use then delete it
    public static function check($token){
        $tokenName = Config::get('session/token_name');
        if (Session::exists($tokenName) && $token === Session::get($tokenName)) {
            Session::delete($tokenName);
            return true;
        }
        return false;
    }
}
/*
*Token::stdClass Complete as at 25/01/2015 09:06:05 PM
*Signed : Kevin Barasa(Author)
*/