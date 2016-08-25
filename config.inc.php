<?php
date_default_timezone_set("Pacific/Auckland");

error_reporting(E_ALL);

define("DEV_ENVIRONMENT", false);
ini_set("display_errors", true);
ini_set("log_errors", 1);
ini_set("error_log", getcwd(). "/php-error.log");

define("DB_HOST", 'localhost');
define("DB_NAME", 'elite-screenshots');
define("DB_USER", '');
define("DB_PASSWORD", '');



