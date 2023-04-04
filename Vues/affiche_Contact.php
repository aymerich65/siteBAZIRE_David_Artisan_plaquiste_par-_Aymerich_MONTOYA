<div class="pagecontactstyle">
<h1 class="h1contactstyle">Contact</h1>

<h2>Téléphone : <a href="tel:+33674582483">0674582483</a></span></h2><span>

<h2>Envoyer un e-mail :</h2>
<form action=<?php echo $action; ?> method="post">

  <label for="nom" class="formulairenomtitlestyle">Nom :<input type="text" id="nom" name="nom" required></label>
        
  <br>

   <label for="email" class="formulaireemailtitlestyle">Votre e-mail :<input type="email" id="email" name="email" required></label>
        
  <br>

   <label for="sujet" class="formulairesujettitlestyle">Sujet : <input type="text" id="sujet" name="sujet" required></label>
   <br> 
  
   <label for="message" class="formulairemessagetitlestyle">Message :</label>
   <br>
    
   <textarea id="message" name="message" rows="4" cols="35"required></textarea>
   <br>

    <button type="submit">Envoyer</button>

</form>
</div>

