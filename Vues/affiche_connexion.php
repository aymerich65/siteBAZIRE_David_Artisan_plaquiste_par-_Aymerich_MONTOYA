<?php

ob_start();
$titrePage = "BAZIRE David artisan plaquiste - Connexion";
?>
<div class="connexionstyle">
    <h1>Connexion</h1>



    <form action="" method="post" class="formularcontainer">

        <label class="imputlabelA">Identifiant:</label>
        <div class="imputB"><input type="text" name="id" required class="imputdimension"></div>

        <label class="imputlabelC">Mot de passe: </label>
        <div class="imputD"><input type="password" name="password" required class="imputdimension"></div>
        <div class="formularbuttoncontainer">
            <button type="submit" value="Connexion" class="formularbuttonstyle">Valider
        </div>
</div>
</form>
</div>
<?php
$contenu = ob_get_clean();
require_once 'Layout.php';