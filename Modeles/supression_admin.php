<?php
function suppressionAdmin()
{
    try {
        $idSupp = htmlspecialchars($_POST['id_supp'], ENT_QUOTES);

        require_once __DIR__ . '../../config.php';
        require_once __DIR__ . '../../vendor/autoload.php';
        $pdo = new PDO(DB_DSN, DB_USER, DB_PASSWORD);

        $myTable = $pdo->prepare("DELETE FROM administrateurs WHERE id = :id");
        $myTable->bindValue(':id', $idSupp, PDO::PARAM_STR);
        $myTable->execute();

        echo 'Suppression de l\'administrateur effectuée';
        echo '<div>';
        echo '<a href="../../index.php?page=admin"><button class="button-reservation-style">Retour page administrateur</button></a>';
        echo '</div>';
        exit;
    } catch (Exception $exception) {
        echo '<div>';
        echo 'Une erreur s\'est produite : ' . $PDOException->getMessage();
        echo '<a href="../../index.php?page=admin"><button class="button-reservation-style">Retour page administrateur</button></a>';
        echo '</div>';
        exit;
    }
}

suppressionAdmin();
?>
