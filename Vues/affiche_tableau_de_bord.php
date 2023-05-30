<?php
ob_start();
$titrePage = "BAZIRE David artisan plaquiste - Tableau de bord";
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

<div class="h2adminpagestyle">
  <h2 >Insérer un administrateur</h2>
</div>
<form action="Modeles/insertion_admin.php" method="post">
  <label for="id">ID:</label>
  <input type="text" id="id" name="id" pattern="\d+" min="0" required>
  
  <label for="password" class="mpimputmobile">Mot de passe:</label>
  <input type="password" id="password" name="password" required>
  
  <button type="submit" name="ajouter">Ajouter</button>
</form>

<div class="h2adminpagestyle">
  <h2>Modifier un administrateur</h2>
</div>
<form action="Modeles/modifier_admin.php" method="post">
    <label for="current_id">ID de l'administrateur courant à modifier:</label>
    <input type="text" id="current_id" name="current_id" pattern="\d+" min="0" required>
  <br>  
    <label for="new_id" class="mpimputmobile">Nouvel ID:</label>
    <input type="text" id="new_id" name="new_id" pattern="\d+" min="0" required>
  
    <label for="new_password">Nouveau mot de passe:</label>
    <input type="password" id="new_password" name="new_password" required>
  
    <button type="submit" name="modifier">Modifier</button>
</form>


<div class="h2adminpagestyle">
  <h2 >Supprimer un administrateur</h2>
</div>
<form action="Modeles/supression_admin.php" method="post">
  <label for="id_supp">ID de l'administrateur à supprimer:</label>
  <input type="text" id="id_supp" name="id_supp" pattern="\d+" min="0" required>
  
  <button type="submit" name="supprimer">Supprimer</button>
</form>






<h2 class="h2adminpagestyle">Déconnexion du tableau de bord</h2>
<form action="Modeles/logout.php" method="post" class="deconnexionpageadminstyle">
  
    <input type="submit" value="Déconnexion">
</form>
</div>

<?php
$contenu = ob_get_clean();
require_once 'Layout.php';