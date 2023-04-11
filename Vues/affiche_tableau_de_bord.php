<h1>Tableau de bord</h1>
<h2>Liste images stockées</h2>

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
    echo "<tr><td>" . $id . "</td>" . "<td>" . $filename . "</td>" . "&nbsp;" . "<td>" . $description . "</td></tr>";
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







