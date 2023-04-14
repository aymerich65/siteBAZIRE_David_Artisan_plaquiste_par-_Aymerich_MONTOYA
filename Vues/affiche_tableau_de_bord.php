<?php
use Firebase\JWT\JWT;

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

var_dump($_SESSION);

var_dump($_SESSION['jwt']);



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
  <input type="number" id="id" name="id" required class="imputidstyle">

  <br>

  <label for="filename">Nom du fichier :</label>
  <input type="text" id="filename" name="filename" required>

  <br>

  <label for="description">Description :<br>  <textarea id="description" name="description" required class="textareadesriptionstyle"></textarea></label>


  <br>

  <label for="image">Sélectionnez une image :</label>
  <input type="file" id="image" name="image" accept="image/*" required class="selectimagestyle">

  <br>

  <input type="submit" value="Envoyer">
</form>
</div>

<form action="Modeles/BDDinteraction/insertion_admin.php" method="POST">
    <label for="id">Identifiant :</label>
    <input type="text" name="id" id="id" required>
    <br>
    <label for="password">Mot de passe :</label>
    <input type="password" name="password" id="password" required>
    <br>
    <input type="submit" value="Ajouter">
</form>







