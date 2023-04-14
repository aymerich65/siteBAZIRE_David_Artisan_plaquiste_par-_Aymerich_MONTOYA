<?php
require_once 'JWT/authentification.php';
?>

<h2>Connexion</h2>
<form action="Modeles/traitement_connexion.php" method="post">
    <div>
        <label>Identifiant:<input type="text" name="id" required></label>
    </div>    
    <div>
        <label>Mot de passe: <input type="password" name="password" required></label>
    </div>
    <div>
        <input type="submit" value="Connexion">
    </div>
</form>