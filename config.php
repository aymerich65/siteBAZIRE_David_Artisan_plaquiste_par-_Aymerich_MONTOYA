<?php

require_once __DIR__ . '/vendor/autoload.php';
use Dotenv\Dotenv;


$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();
$url = getenv('JAWSDB_URL');

if($url){
    $dbparts = parse_url($url);

    $hostname = $dbparts['host'];
    $envuser = $dbparts['user'];
    $envpassword = $dbparts['pass'];
    $database = ltrim($dbparts['path'], '/');
    $dsn = "mysql:host=$hostname;dbname=$database;charset=utf8mb4";
var_dump($envuser);
    define("DB_DSN", $dsn);
    define("DB_USER", $envuser);
    define("DB_PASSWORD", $envpassword);
}else{
       $dsn = $_ENV['DB_DSN'];
    $envuser = $_ENV['DB_USERNAME'];
    $envpassword = $_ENV['DB_PASSWORD'];
    $secret = $_ENV['SECRET'];
    $token = $_ENV['TOKEN'];
    $sendgridapikey = $_ENV['SENDGRID_API_KEY'];


    define("DB_DSN", $dsn);
    define("DB_USER", $envuser);
    define("DB_PASSWORD", $envpassword);
    define("SECRET", $secret);
    define("TOKEN", $token);
    define("SENDGRID_API_KEY", $sendgridapikey); 
}









try {
    $pdo = new PDO(DB_DSN, DB_USER, DB_PASSWORD);

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}



