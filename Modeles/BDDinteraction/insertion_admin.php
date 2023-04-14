<?php

function insertionAdmintable()
{
    try {

        $id=htmlspecialchars($_POST['id'], ENT_QUOTES);
        $password= htmlspecialchars($_POST['password'], ENT_QUOTES);





/* Utilisation du fichier config pour récupérer les variables d'environnement:*/
require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../vendor/autoload.php';
$pdo = new PDO(DB_DSN, DB_USER, DB_PASSWORD);

$myTable = $pdo->prepare("INSERT INTO administrateurs (id, password) VALUES (:id, :password)");
    $myTable->bindValue(':id', $id, PDO::PARAM_STR);
    $myTable->bindValue(':password', password_hash($password,PASSWORD_BCRYPT));
    $myTable->execute();

        echo 'Insertion faite avec succès';


    } catch (Exception $exception) {
        echo 'une erreur c\'est produite:' . $exception->getMessage();
    }
}

insertionAdmintable();
