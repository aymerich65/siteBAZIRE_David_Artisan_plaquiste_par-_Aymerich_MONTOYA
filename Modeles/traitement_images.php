<?php



/* Utilisation du fichier config pour récupérer les variables d'environnement:*/
require_once __DIR__ . '../../config.php';
require_once __DIR__ . '../../vendor/autoload.php';
$pdo = new PDO(DB_DSN, DB_USER, DB_PASSWORD);



/* variables du formulaire */

$id = htmlentities($_POST['id'], ENT_QUOTES, 'UTF-8');

$filename =html_entity_decode(htmlentities($_POST['filename'], ENT_QUOTES, 'UTF-8'));
$filename = strtr($filename, array(
    'À' => 'A', 'Â' => 'A', 'Ä' => 'A', 'Á' => 'A', 'Ã' => 'A', 'Å' => 'A', 'à' => 'a', 'â' => 'a', 'ä' => 'a', 'á' => 'a', 'ã' => 'a', 'å' => 'a',
    'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e',
    'Î' => 'I', 'Ï' => 'I', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i',
    'Ô' => 'O', 'Ö' => 'O', 'Ò' => 'O', 'Ó' => 'O', 'Õ' => 'O', 'Ø' => 'O', 'ô' => 'o', 'ö' => 'o', 'ò' => 'o', 'ó' => 'o', 'õ' => 'o', 'ø' => 'o',
    'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'u',
    'Ÿ' => 'Y', 'ÿ' => 'y', 'Ñ' => 'N', 'ñ' => 'n'
));
$filename = str_replace(' ', '_', $filename);
$description = html_entity_decode(htmlentities($_POST['description'], ENT_QUOTES, 'UTF-8'));





function getExtensionFromMimeType(string $mimeType): ?string {
switch ($mimeType) {
case 'image/jpeg':
return 'jpg';
case 'image/png':
return 'png';
case 'image/gif':
return 'gif';
default:
return null;
}
}

function moveUploadedFile(array $uploadedFile, &$targetFile, $filename, $targetDir): bool {
$finfo = new finfo(FILEINFO_MIME_TYPE);
$mimeType = $finfo->file($uploadedFile['tmp_name']);
$extension = getExtensionFromMimeType($mimeType);
if ($extension === null) {

    echo '<div class="button-container mytestcolor">';
    echo '<a href="../../index.php?page=admin"><button class="button-reservation-style">Retour page administrateur</button></a>';
    echo '</div>';



return false;
}

$targetFile = $targetDir . DIRECTORY_SEPARATOR . $filename. '.' . $extension;
return move_uploaded_file($uploadedFile['tmp_name'], $targetFile);
}





/*Contrôle du fichier*/




if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
$fileInfo = new finfo(FILEINFO_MIME_TYPE);
$mimeType = $fileInfo->file($_FILES['image']['tmp_name']);
$extension = getExtensionFromMimeType($mimeType);
if ($extension === null) {
echo 'Type de fichier invalide';

    echo '<div class="button-container mytestcolor">';
    echo '<a href="../../index.php?page=admin"><button class="button-reservation-style">Retour page administrateur</button></a>';
    echo '</div>';
    exit;
}
$taille_fichier = $_FILES['image']['size'];


if ($taille_fichier > 5000000) {
echo 'Fichier trop volumineux';

    echo '<div class="button-container mytestcolor">';
    echo '<a href="../../index.php?page=admin"><button class="button-reservation-style">Retour page administrateur</button></a>';
    echo '</div>';


exit;
}


/*Contrôle de l'existence du dossier*/

$targetDir = '../images'; 
if (!$targetDir || !is_dir($targetDir)) {
    echo 'Le dossier de destination n\'existe pas ou n\'a pas les permissions nécessaires.';
    echo '<div class="button-container mytestcolor">';
    echo '<a href="../../index.php?page=admin"><button class="button-reservation-style">Retour page administrateur</button></a>';
    echo '</div>';
    exit;
}




/*Création du nom de fichier */

function extractFilename($path) {
    $pos = max(strrpos($path, '/'), strrpos($path, '\\')); 
    if ($pos !== false) { 
        return substr($path, $pos + 1); 
    }
    return $path; 
}







$targetFile = '';
if (moveUploadedFile($_FILES['image'], $targetFile, $filename, $targetDir)) {
    echo 'Téléchargement réussi.';
    /*Création du nom de fichier avec l'extention*/
   $filename = extractFilename($targetFile);
   echo $filename; 
try{
$myTable = $pdo->prepare("INSERT INTO galerie_images (id, filename, description) VALUES (:id, :filename, :description)");
$myTable->bindValue(':id', $id, PDO::PARAM_INT);
$myTable->bindValue(':filename', $filename, PDO::PARAM_STR);
$myTable->bindValue(':description', $description, PDO::PARAM_STR);
$myTable->execute();

    echo '<div class="button-container mytestcolor">';
    echo '<a href="../../index.php?page=admin"><button class="">Retour page administrateur</button></a>';
    echo '</div>';
    exit;}catch(Exception $e){
        echo 'Une erreur est survenue lors du téléchargement du fichier: ' . $e->getMessage();
        echo '<div class="button-container mytestcolor">';
        echo '<a href="../../index.php?page=admin"><button class="">Retour page administrateur</button></a>';
        echo '</div>';
        exit;
    }


} else {
echo 'Une erreur est survenue lors du téléchargement du fichier.';
    echo '<div class="button-container mytestcolor">';
    echo '<a href="../../index.php?page=admin"><button class="e">Retour page administrateur</button></a>';
    echo '</div>';
    exit;
}

} else {
echo 'Une erreur est survenue lors de l\'envoi du fichier.';
    echo '<div class="button-container mytestcolor">';
    echo '<a href="../../index.php?page=admin"><button class="">Retour page administrateur</button></a>';
    echo '</div>';
    exit;
}

if (file_exists($targetFile)) {
echo 'Le fichier a été déplacé avec succès dans le dossier "galerie".';
    echo '<div class="button-container mytestcolor">';
    echo '<a href="../../index.php?page=admin"><button class="e">Retour page administrateur</button></a>';
    echo '</div>';
    exit;

} else {
echo 'Le fichier n\'a pas été déplacé dans le dossier "galerie". Veuillez vérifier les permissions du dossier.';
    echo '<div class="button-container mytestcolor">';
    echo '<a href="../../index.php?page=admin"><button class="">Retour page administrateur</button></a>';
    echo '</div>';
    exit;
}

