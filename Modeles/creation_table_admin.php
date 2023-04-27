<?php

function createAdmintable()
{
    try {


/* Utilisation du fichier config pour récupérer les variables d'environnement:*/
require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../vendor/autoload.php';
$pdo = new PDO(DB_DSN, DB_USER, DB_PASSWORD);

$AdministratorsTable ="CREATE TABLE administrateurs (
    id VARCHAR(60) NOT NULL PRIMARY KEY UNIQUE,
    password VARCHAR(60) NOT NULL 

    )";

$pdo->exec($AdministratorsTable);
        echo 'La table a été créée';


    } catch (Exception $exception) {
        echo 'une erreur c\'est produite:' . $exception->getMessage();
    }
}

createAdmintable();
