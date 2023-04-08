<?php

require_once __DIR__ . '/vendor/autoload.php';
use Dotenv\Dotenv;


$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();


    $dsn = $_ENV['DB_DSN'];
    $envuser = $_ENV['DB_USERNAME'];
    $envpassword = $_ENV['DB_PASSWORD'];


    define("DB_DSN", $dsn);
    define("DB_USER", $envuser);
    define("DB_PASSWORD", $envpassword);


try {
    $pdo = new PDO(DB_DSN, DB_USER, DB_PASSWORD);

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}



