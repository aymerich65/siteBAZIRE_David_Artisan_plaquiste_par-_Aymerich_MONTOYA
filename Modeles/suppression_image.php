<?php

require_once __DIR__ . '../../config.php';
require_once __DIR__ . '../../vendor/autoload.php';

$id = htmlspecialchars($_POST['id'],ENT_QUOTES);
$filename = htmlspecialchars($_POST['filename'],ENT_QUOTES);


try{
    // Suppression du fichier dans son dossier images
    $image_path = __DIR__ . '/../images/' . $filename;
    if (unlink($image_path) === true && file_exists($image_path) === false) {
  // Suppression de l'image en base de données
        $pdo = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
        $statement = $pdo->prepare("DELETE FROM galerie_images WHERE id = :id");
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute(); 

        echo 'Suppression effectuée.';
        echo '<div>';
        echo '<a href="../../index.php?page=admin"><button class="button-reservation-style">Retour page administrateur</button></a>';
        echo '</div>';
        exit;
    } else {
        throw new Exception("Impossible de supprimer le fichier image.");
    }
} catch(PDOException $PDOException){
    echo '<div>';
    echo 'Erreur lors de la suppression de l\'image : ' . $PDOException->getMessage();
    echo '<a href="../../index.php?page=admin"><button class="button-reservation-style">Retour page administrateur</button></a>';
    echo '</div>';
    exit;
    
} catch (Exception $e) {
    echo '<div>';
    echo 'Erreur lors de la suppression de l\'image : ' . $e->getMessage();
    echo '<a href="../../index.php?page=admin"><button class="button-reservation-style">Retour page administrateur</button></a>';
    echo '</div>';
    exit;
}
