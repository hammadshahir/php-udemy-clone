<?php
    spl_autoload_register('myLoader');

    function myLoader($className)
    {
        require "../app/models/" .$className . ".php";
    }

    require "config.php";
    require "functions.php";
    require "database.php";
    require "model.php";
    require "controller.php";
    require "app.php";