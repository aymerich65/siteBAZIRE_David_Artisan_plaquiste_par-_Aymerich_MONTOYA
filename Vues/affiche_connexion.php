<?php
//require_once 'JWT/authentification.php';


?>

<h1>Connexion</h1>



<form action="Modeles/traitement_connexion.php" method="post" class="formularcontainer">

        <label class="imputlabelA">Identifiant:</label>
        <div class="imputB"><input type="text" name="id" required class="imputdimension"></div>

        <label class="imputlabelC">Mot de passe: </label>
        <div class="imputD"><input type="password" name="password" required class="imputdimension"></div>
    <div class="formularbuttoncontainer">
        <button type="submit" value="Connexion" class="formularbuttonstyle">Valider</div>
    </div>
</form>