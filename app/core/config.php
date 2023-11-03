<?php
//config file

/****
 *  app info
 */

define('APP_NAME', 'Udemy Clone');
define('APP_DESC', 'Free Learning For Everybody');

if ($_SERVER['SERVER_NAME'] == 'localhost' || $_SERVER['SERVER_ADDR'] == '127.0.0.1') {
// Database configuration for your local server
    define('DBHOST', 'mariadb');  // Use the service name defined in docker-compose.yml
    define('DBNAME', 'udemy_clone_db');
    define('DBUSER', 'root');
    define('DBPASS', 'root_password');

    // Root path e.g. localhost
    define('ROOT', 'http://localhost:8085');  // Updated port to 8085
} else {
    // Configure multiple if statements or cases here for different environments
    // Root path e.g. https://www.yourwebsite.com
    // define('ROOT', 'http://');
}