<?php

include_once "../settings.php"; // to get $env
include_once "connectDBLogin.php"; // to get DB login

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($env == 0)
{
    $host = $db_host_dev; 	 
    $db   = $db_schema_dev;      // DB name
    $user = $db_user_dev;	    // DB user
    $pass = $db_pwd_dev;	    // DB password
}

if ($env == 1)
{
    $host = $db_host_prod; 	    // loopback
    $db   = $db_schema_prod;    // DB name
    $user = $db_user_prod;	    // DB user
    $pass = $db_pwd_prod;	    // DB password
}

$dsn = "mysql:host=$host;dbname=$db";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

$pdo = null;

try 
{
    $pdo = new PDO($dsn, $user, $pass, $options); // $pdo is an object (instance) of PDO
} 
catch (PDOException $e) 
{
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}

if (!defined('JSON_INVALID_UTF8_SUBSTITUTE')) 
{
    //PHP < 7.2 Define it as 0 so it does nothing
    define('JSON_INVALID_UTF8_SUBSTITUTE', 0);
}

?>