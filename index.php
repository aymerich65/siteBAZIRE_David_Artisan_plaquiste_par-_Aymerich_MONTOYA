<?php
if (session_status() === PHP_SESSION_NONE) {


    if(isset($_ENV['DYNO'])){

        ini_set('session.cookie_secure', 1);

        ini_set('session.cookie_samesite', 'Strict');
    } else {

        ini_set('session.cookie_secure', 0);


    }

        session_start();

}

require_once 'Controleurs/controleur.php';


$id= 'accueil';
$id = isset($_GET['page']) ? $_GET['page'] : 'accueil';
$controleur = new MyControler();

if ($id === 'accueil') {
    $controleur->pageAccueil();
}else if ($id === 'contact'){
    $controleur->pageContact();
}else if ($id === 'galerie'){
    $controleur->pageGalerie();
}else if ($id === 'prestations'){
    $controleur->pagePrestations();
}else if ($id === 'connexion'){
    $controleur->pageConnexion();
}else if ($id === 'admin'){
    $controleur->pageAdmin();
}else if ($id === 'test'){
    $controleur->pagetest();
}else if ($id === 'mentions'){
    $controleur->pageMentions();
}else 
{
    echo 'Page non trouvée';
}
