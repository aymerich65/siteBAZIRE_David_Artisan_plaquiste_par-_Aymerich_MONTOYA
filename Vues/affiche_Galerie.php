<?php
/*




ob_start();
?>
<div> <?php echo var_dump($mybddTable); ?></div>
<?php
$contenu = ob_get_clean();
require_once 'Layout.php';
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config.php';
$pdo = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
$myrequest = $pdo->prepare('SELECT * FROM galerie_images');
$myrequest->execute();
$mybddTable = $myrequest->fetchAll(PDO::FETCH_ASSOC);  
$imageFolder = '';             
$myrequest = $pdo->prepare('SELECT * FROM galerie_images');
$myrequest->execute();
$mybddTable = $myrequest->fetchAll(PDO::FETCH_ASSOC);  
$imageFolder = '';
var_dump($mybddTable);*/
$url = getenv('JAWSDB_URL');

if ($url) {
    echo $url;
} else {
    echo 'La variable JAWSDB_URL n\'est pas définie.';
}
