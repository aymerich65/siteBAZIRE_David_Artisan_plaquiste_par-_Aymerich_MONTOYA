<?php
ob_start();

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config.php';
$pdo = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
             
             $myrequest = $pdo->prepare('SELECT * FROM galerie_images');
             $myrequest->execute();
             $mybddTable = $myrequest->fetchAll(PDO::FETCH_ASSOC);  
             $imageFolder = '';

?>
<div> <?php echo var_dump($mybddTable); ?></div>
<?php
$contenu = ob_get_clean();
require_once 'Layout.php';