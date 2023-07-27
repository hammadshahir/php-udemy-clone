<?php
//config file

// Check server is local or production
// echo "<pre>";
// print_r($_SERVER);

/****
 *  app info
 */

 define('APP_NAME', 'Udemy Clone');
 define('APP_DESC', 'Free Tuotials For Everybody');

if($_SERVER['SERVER_NAME'] == 'localhost')
{
    // Database confirguration for your local server
    define('DBHOST', 'localhost');
    define('DBNAME', 'udemy_clone_db');
    define('DBUSER', 'root');
    define('DBPASS', '');
    define('DBDRIVER', 'mysql');

    //root path e.g. localhost
    define('ROOT', 'http://localhost/php-udemy-clone/public');
    
} else {
    // Configure multiple if statements or cases here for local (workbench, QA and Production)
    // //root path e.g https://www.yourwebsite.com
	// define('ROOT', 'http://');
}