<?php
ob_start();

header('Access-Control-Allow-Origin: *');


if (isset($_SESSION['jwt'])) {
  $token = $_SESSION['jwt'];}
  
  // Vérification de la validité du jeton JWT
  $newtokentest = new JWT();
  if (!$newtokentest->check($token, SECRET)) {
      http_response_code(401);
      echo json_encode(['message' => 'Jeton JWT invalide'], JSON_UNESCAPED_UNICODE);
      header('Location: /index.php?page=accueil');
      exit;

  }
  if ($newtokentest->isExpired($token)) {
    http_response_code(401);
    echo json_encode(['message' => 'Jeton JWT invalide'], JSON_UNESCAPED_UNICODE);
    header('Location: /index.php?page=accueil');
    exit;

}


?>





<div class="containeradminstyle">
<h1 class="h1tableaudebord">Tableau de bord</h1>
<h2 class="h2tableau">Liste des images stockées</h2>
<table class="tableadminpagestyle">
  <tr>
    <th>Numéro d'image (id)</th>
    <th>Nom du fichier</th>
    <th>Description de l'image</th>
  </tr>
<?php
  $imageindex = 0;
  foreach ($mybddTable as $image) {
      $id = $image['id'];
      $filename = $image['filename'];
      $description = $image['description'];
      echo "<tr><td>" . $id . "</td>" . "<td>" . $filename . "</td>" . "<td>" . $description . "</td></tr>";
      $imageindex++;
  }
?>
</table>



<div class="h2adminpagestyle"><h2 >Insérer une image</h2></div>
<form action="Modeles/traitement_images.php" method="post" enctype="multipart/form-data">
  <label for="id">ID :</label>
  <input type="number" id="id" name="id" required class="imputidstyle" pattern="\d+" min="0">

  <br>

  <label for="filename" class="nomfichierstyle">Nom du fichier :</label>
  <input type="text" id="filename" name="filename"  required>

  <br>

  <label for="description">Description :<br>  <textarea id="description" name="description" required class="textareadesriptionstyle"></textarea></label>


  <br>

  <label for="image">Sélectionnez une image :</label>
  <input type="file" id="image" name="image" accept="image/*" required class="selectimagestyle">

  <br>

  <input type="submit" value="Envoyer">
</form>




<div class="h2adminpagestyle"><h2 >Supprimer une image</h2></div>
<form action="Modeles/suppression_image.php" method="post" enctype="multipart/form-data">
  <label for="id">Numéro d'image(id)</label>
  <input type="number" class="imputidstyle" id="id" name="id"  pattern="\d+" min="0" required>
  <br>
  <label for="filename" class="nomfichierstyle">Nom du fichier :</label>
  <input type="text" id="filename" name="filename" required placeholder="Nom exacte du fichier en base de donnée">
  <br>
  <input type="submit" value="Envoyer">
</form>




<!-- Modification d'image:-->
<div class="h2adminpagestyle"><h2 >Modifier une image</h2></div>
<form action="Modeles/modification_image.php" method="post" enctype="multipart/form-data">
  <label for="id">ID :</label>
  <input type="number" id="id" name="id" required class="imputidstyle" pattern="\d+" min="0">

  <br>

  <label for="filename" class="nomfichierstyle">Nom du fichier :</label>
  <input type="text" id="filename" name="filename" required placeholder="Nom exacte du fichier en base de donnée">

  <br>

  <label for="description">Description :<br>  <textarea id="description" name="description" required class="textareadesriptionstyle"></textarea></label>


  <br>

  <label for="image">Sélectionnez une image :</label>
  <input type="file" id="image" name="image" accept="image/*" required class="selectimagestyle">

  <br>

  <input type="submit" value="Envoyer">
</form>


<form action="Modeles/logout.php" method="post" class="deconnexionpageadminstyle">
  <h2>Déconnexion du tableau de bord</h2>
    <input type="submit" value="Déconnexion">
</form>
</div>

<?php
$contenu = ob_get_clean();
require_once 'Layout.php';