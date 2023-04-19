<div class="pagecontactstyle">
<h1 class="h1contactstyle">Contact</h1>

<h2>Téléphone : <a href="tel:+33674582483">0674582483</a></span></h2><span>

<h2>Envoyer un e-mail :</h2>
<form action=<?php echo $action; ?> method="post" class="">
<div class="nameline">
  <label for="nom" class="labelnamestyle">Nom :</label><input type="text" id="nom" name="nom" required class="nameimputstyle">
    </div>    
  <br>
  <div class="mailline">
   <label for="email" class="labelamilstyle">Votre e-mail :</label><input type="email" id="email" name="email" required class="emailimputstyle">
   </div>  
  <br>
  <div class="sujetline">
   <label for="sujet" class="sujetstyle">Sujet : </label><input type="text" id="sujet" name="sujet" required class="sujetimputstyle">
</div>
   <br> 
   <div class="messageline">
   <label for="message" class="formulairemessagetitlestyle">Message :</label>
</div>
   <br>
   <textarea id="message" name="message" rows="4" cols="35"required class="messageimputstyle"></textarea>
   <br>

    <button type="submit">Envoyer</button>

</form>
</div>

