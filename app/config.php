<?php
//change the values to your database settings
define('DB_HOST', 'localhost'); //localhost
define('DB_USER', 'root');  //username
define('DB_PASSWORD', '');  //password
define('DB_NAME', 'site_ground'); //database name
define('URL', 'http://localhost/likeground.com'); //end url with '/'
$url=URL; 
$kenhost=('localhost'); //end url with '/'

if (version_compare(phpversion(), '5.4.0', '<') == true) {
	exit('PHP5.4+ Required');
}
require_once('castro_func.php');

//site setting

$sname='Like Giver';
$social="https://facebook.com/likegiver";

//remove error reporting
//error_reporting(0);
//end remove error reporting
?>