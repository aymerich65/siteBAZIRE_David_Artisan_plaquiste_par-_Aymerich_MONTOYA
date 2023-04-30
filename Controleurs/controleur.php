<?php

class MyControler
{
    public function pageAccueil(): void
    {   
        require_once 'Vues/affiche_Accueil.php';  
    }

    public function pageContact()
    {

         require_once 'Vues/affiche_Contact.php';
     

    }




    public function pageGalerie()
    {

        /* utilisation du fichier config pour récupérer les variables d'environnement:*/
        //require_once 'vendor/autoload.php';
        //require_once 'config.php';
        //require_once 'Modeles/requetesql_vers_galerie_images.php';
        require_once 'Vues/affiche_Galerie.php';
     
    }



    public function pagePrestations()
    {

         require_once 'Vues/affiche_Prestations.php';

    }




    public function pageAdmin()
    {
        /* utilisation du fichier config pour récupérer les variables d'environnement:*/
        require_once 'vendor/autoload.php';
        require_once 'config.php';
        require_once 'JWT/validate_jwt.php';

        $pdo = new PDO(DB_DSN, DB_USER, DB_PASSWORD);

        $myrequest = $pdo->prepare('SELECT * FROM galerie_images');
        $myrequest->execute();
        $mybddTable = $myrequest->fetchAll(PDO::FETCH_ASSOC);
        $imageFolder = '';




       require_once 'Vues/affiche_tableau_de_bord.php';
  

    
    }

    public function traitementinsertion()
    {
        /* utilisation du fichier config pour récupérer les variables d'environnement:*/
        require_once 'vendor/autoload.php';
        require_once 'config.php';
        require_once 'Modeles/traitement_images.php';
    }




    public function pageConnexion()
    {
        require_once 'Modeles/traitement_connexion.php';

         require_once 'Vues/affiche_connexion.php';
     

 
        require_once 'JWT/authentification.php';
    }

    public function pagetest()
    {
        $header = require_once 'Vues/affiche_Header.php';
        $main = require_once 'Vues/pagetest';
        $footer = require_once 'Vues/affiche_Pied_de_page.php';

        require_once 'Vues/layout.php';
    }


    public function pageMentions()
    {
    
        require_once 'Vues/affiche_mentionslegales.php';
   

 
    }
}
