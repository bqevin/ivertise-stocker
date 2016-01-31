<?php
/*
*Author: Kevin Barasa
*Phone : +254724778017
*Email : kevin.barasa001@gmail.com
*/


//The function checks the input HTML and parses it to standard character set + find end quotes
function escape($string){
return htmlentities($string, ENT_QUOTES, 'UTF-8');
}

/*
escape() Complete as at 23/01/2015 04:06:05 AM
*Signed : Kevin Barasa(Author)
*/