<?php

include_once "../settings.php"; // to get $env

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if ($env == 0)
{
    $host = '127.0.0.1:8889'; 	// loopback (se stesso)
    $db   = 'netlogo';          // nome del DB
    $user = 'root';	            // utente del DB
    $pass = 'root';	            // password utente del DB
}


if ($env == 1)
{
    $host = '127.0.0.1'; 	    // loopback (se stesso)
    $db   = 'my_webtutorial';    // nome del DB
    $user = 'webtutorial';	    // utente del DB
    $pass = '';	    // password utente del DB
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
    $pdo = new PDO($dsn, $user, $pass, $options); // $pdo è un oggetto della classe PDO
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