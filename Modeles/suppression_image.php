<?php



// Utilisation du fichier config pour récupérer les variables d'environnement:
require_once __DIR__ . '../../config.php';
require_once __DIR__ . '../../vendor/autoload.php';

$id = htmlspecialchars($_POST['id'],ENT_QUOTES);

try{
$pdo = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
$statement = $pdo->prepare("DELETE FROM galerie_images WHERE id = :id");
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
    $statement->execute(); 
    echo 'Suppression effectuée.';
    echo '<div>';
    echo '<a href="../../index.php?page=admin"><button class="button-reservation-style">Retour page administrateur</button></a>';
    echo '</div>';
    exit;

}catch(PDOException $PDOException){
    echo '<div>';
    echo '<a href="../../index.php?page=admin"><button class="button-reservation-style">Retour page administrateur</button></a>';
    echo '</div>';
    exit;
}