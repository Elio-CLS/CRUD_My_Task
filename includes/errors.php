<?php
// Error/Exception engine, always use E_ALL
error_reporting(E_ALL);

// Always use TRUE
ini_set('ignore_repeated_errors', TRUE);

// Error/Exception display, use FALSE only ini_set
ini_set('display_errors', FALSE);

// Error/Exception file loggin engine
ini_set('log_errors', TRUE);

ini_set("error_log", "/laragon/www/CRUD_php_SQL_Bootstrap/error/php-error.log");
error_log('-------------------------NUEVO---------------------------')

?>