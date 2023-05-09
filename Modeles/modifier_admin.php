<?php
function modificationAdmin()
{
    try {
        $currentId = htmlspecialchars($_POST['current_id'], ENT_QUOTES);
        $newId = htmlspecialchars($_POST['new_id'], ENT_QUOTES);
        $newPassword = htmlspecialchars($_POST['new_password'], ENT_QUOTES);

        require_once __DIR__ . '../../config.php';
        require_once __DIR__ . '../../vendor/autoload.php';
        $pdo = new PDO(DB_DSN, DB_USER, DB_PASSWORD);

        $myTable = $pdo->prepare("UPDATE administrateurs SET id = :new_id, password = :password WHERE id = :current_id");
        $myTable->bindValue(':new_id', $newId, PDO::PARAM_STR);
        $myTable->bindValue(':password', password_hash($newPassword, PASSWORD_BCRYPT));
        $myTable->bindValue(':current_id', $currentId, PDO::PARAM_STR);
        $myTable->execute();

        echo 'Administrateur modifié';
        echo '<div>';
        echo '<a href="../../index.php?page=admin"><button class="button-reservation-style">Retour page administrateur</button></a>';
        echo '</div>';
        exit;
    } catch (Exception $exception) {
        echo '<div>';
        echo 'Une erreur s\'est produite : ' . $exception->getMessage();
        echo '<a href="../../index.php?page=admin"><button class="button-reservation-style">Retour page administrateur</button></a>';
        echo '</div>';
        exit;
    }
}

modificationAdmin();
