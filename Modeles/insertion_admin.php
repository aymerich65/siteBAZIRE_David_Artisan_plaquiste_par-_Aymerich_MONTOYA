<?php
function insertionAdmin()
{
    try {
        $id = htmlspecialchars($_POST['id'], ENT_QUOTES);
        $password = htmlspecialchars($_POST['password'], ENT_QUOTES);

        require_once __DIR__ . '../../config.php';
        require_once __DIR__ . '../../vendor/autoload.php';
        $pdo = new PDO(DB_DSN, DB_USER, DB_PASSWORD);

        $myTable = $pdo->prepare("INSERT INTO administrateurs (id, password) VALUES (:id, :password)");
        $myTable->bindValue(':id', $id, PDO::PARAM_STR);
        $myTable->bindValue(':password', password_hash($password, PASSWORD_BCRYPT));
        $myTable->execute();

        echo 'Administrateur créé';
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

insertionAdmin();
?>
