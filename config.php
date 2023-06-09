<?php

require_once __DIR__ . '/vendor/autoload.php';


use Dotenv\Dotenv;

$mode_prod = true;


if ($mode_prod === true) {

    $url = getenv('JAWSDB_URL');
    $dbparts = parse_url($url);

    $hostname = $dbparts['host'];
    $envuser = $dbparts['user'];
    $envpassword = $dbparts['pass'];
    $database = ltrim($dbparts['path'], '/');
    $dsn = "mysql:host=$hostname;dbname=$database;charset=utf8mb4";

    $secret = $_ENV['SECRET'];


    define("DB_DSN", $dsn);
    define("DB_USER", $envuser);
    define("DB_PASSWORD", $envpassword);
    define("SECRET", $secret);
    define("TOKEN", $token);
} else {


    $dotenv = Dotenv::createImmutable(__DIR__);
    $dotenv->load();
    $dsn = $_ENV['DB_DSN'];





    $envuser = $_ENV['DB_USERNAME'];
    $envpassword = $_ENV['DB_PASSWORD'];
    $secret = $_ENV['SECRET'];
    $token = $_ENV['TOKEN'];



    define("DB_DSN", $dsn);
    define("DB_USER", $envuser);
    define("DB_PASSWORD", $envpassword);
    define("SECRET", $secret);
    define("TOKEN", $token);
}









try {
    $pdo = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
