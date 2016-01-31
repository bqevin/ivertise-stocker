<?php
/*
*Author: Kevin Barasa
*Phone : +254724778017
*Email : kevin.barasa001@gmail.com
*
*Checks + gets input data type before submiting it through Input::get('name');
*/
class Input{
    //Checks if a submit data exists
    public static function exists($type = 'post'){
        //Matches submit data to fit the method type
        switch ($type) {
            case 'post':
                return(!empty($_POST)) ? true : false;
                break;
            case 'get':
                return(!empty($_GET)) ? true : false;
                break;
            default:
                return false;
                break;
        }
    }
    //Gets the data input from form directly by name
    public static function get($item){
        if (isset($_POST[$item])) {
            return $_POST[$item];
        } else if (isset($_GET[$item])) {
            return $_GET[$item];
        }
        //Just incase a fiels is blank
        return '';
    }
}

/*Input::stdClass Complete as at 23/01/2015 04:06:05 AM
*Signed : Kevin Barasa(Author)
*/