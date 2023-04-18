<?php
header('Access-Control-Allow-Origin: *');
//header('Content-Type: application/json');

require_once 'Classes/myjwt.php';
require_once './config.php';

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

/*
if (isset($_SERVER['Authorization']) ){
  $token = trim($_SERVER['Authorization']);
}else if (isset($_SERVER['HTTP_AUTHORIZATION']) ){
  $token = trim($_SERVER['HTTP_AUTHORIZATION']);
}elseif(function_exists('apache_request_headers')){
  $requestHeaders = apache_request_headers();
  if(isset($requestHeaders['Authorization'])){
    $token = trim($requestHeaders['Authorization']); 
  }  
}*/

//controle du tken interne
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

  /*
  echo json_encode(['message' => 'Jeton JWT valide'], JSON_UNESCAPED_UNICODE);
} else {
  http_response_code(401);
  echo json_encode(['message' => 'Aucun jeton JWT n\'a été trouvé dans la session'], JSON_UNESCAPED_UNICODE);
  exit();
}
*/

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



<div class="h2adminpagestyle"><h2 >Supprimer une image</h2></div>
<form action="Modeles/suppression_image.php" method="post" enctype="multipart/form-data">
  <label for="id">Numéro d'image(id)</label>
  <input type="number" id="id" name="id" required class="imputidstyle">
  <br>
  <input type="submit" value="Envoyer">
</form>
</div>



<!-- Modification d'image:-->
<div class="h2adminpagestyle"><h2 >Modifier une image</h2></div>
<form action="Modeles/modification_image.php" method="post" enctype="multipart/form-data">
  <label for="id">ID :</label>
  <input type="number" id="id" name="id" required class="imputidstyle">

  <br>

  <label for="filename">Nom du fichier :</label>
  <input type="text" id="filename" name="filename" required placeholder="Nom exacte du fichier en base de donnée">

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

<!-- Modification d'image:
<form action="Modeles/BDDinteraction/insertion_admin.php" method="POST">
    <label for="id">Identifiant :</label>
    <input type="text" name="id" id="id" required>
    <br>
    <label for="password">Mot de passe :</label>
    <input type="password" name="password" id="password" required>
    <br>
    <input type="submit" value="Ajouter">
</form>-->



