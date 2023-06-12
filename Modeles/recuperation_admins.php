<?php
require_once __DIR__ . '../../config.php';
require_once __DIR__ . '../../vendor/autoload.php';
$pdo = new PDO(DB_DSN, DB_USER, DB_PASSWORD);

$query = "SELECT * FROM administrateurs";
$stmt = $pdo->prepare($query);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Vérification si les données peuvent être encodées au format JSON 
if ($result !== false) {
    $jsonResult = json_encode($result);

    if ($jsonResult !== false) {
 
        header('Content-Type: application/json');
        echo $jsonResult;
    } else {
       
        echo 'Erreur d\'encodage JSON';
    }
} else {
    
    echo 'Erreur lors de la récupération des données';
}
?>
