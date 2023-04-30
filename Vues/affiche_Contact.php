<?php
ob_start();
?>

<div class="pagecontactstyle">
   <form action="Modeles/traitementmails.php" method="post" class="formstyle">
<h1 class="h1contactstyle">Contactez moi</h1>

<p class="h2telstyle">Téléphone : <span>0674582483</span></p>

<p class="envoyeremailstyle">Envoyer un e-mail :</p>

<div class="nameline">
  <label for="nom" class="labelnamestyle">Nom :</label><input type="text" id="nom" name="nom" required class="nameimputstyle">
</div>    

  <div class="labelemailstyle">
   <label for="email" class="labelamilstyle">Votre e-mail :</label><input type="email" id="email" name="email" required class="emailimputstyle">
   </div>  
  
  <div class="sujetline">
   <label for="sujet" class="sujetstyle">Sujet : </label><input type="text" id="sujet" name="sujet" required class="sujetimputstyle">
</div>
   <br> 
   <div class="messageline">
   <label for="message" class="formulairemessagetitlestyle">Message :</label>

   <br>
   <textarea id="message" name="message" rows="4" cols="35"required class="messageimputstyle"></textarea>
   <br>
</div>
    <button class="formularbtn" type="submit">Envoyer</button>

</form>
</div>
<?php
$contenu = ob_get_clean();
require_once 'Layout.php';