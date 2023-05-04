<?php




class MyControler
{
    public function pageAccueil()
    {
        require_once 'vendor/autoload.php';
        require_once 'config.php';
        require_once 'Vues/affiche_Accueil.php';
        require_once 'Modeles/traitementmails.php';


    }

    public function pageContact()
    {

        require_once 'Vues/affiche_Contact.php';





    }




    public function pageGalerie()
    {
        require_once 'vendor/autoload.php';
        require_once 'config.php';


        try {

            $pdo = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
            $myrequest = $pdo->prepare('SELECT * FROM galerie_images');
            $myrequest->execute();
            $mybddTable = $myrequest->fetchAll(PDO::FETCH_ASSOC);
            $imageFolder = '';
        } catch (PDOException $e) {
            // Affiche un message d'erreur en cas de problème avec la requête PDO
            echo "Désolé, une erreur s'est produite. Veuillez réessayer plus tard.";
            return;
        }

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
        require_once 'Classes/myjwt.php';

        try {
            $pdo = new PDO(DB_DSN, DB_USER, DB_PASSWORD);

            $myrequest = $pdo->prepare('SELECT * FROM galerie_images');
            $myrequest->execute();
            $mybddTable = $myrequest->fetchAll(PDO::FETCH_ASSOC);
            $imageFolder = '';
        } catch (PDOException $e) {
            // Affiche un message d'erreur en cas de problème avec la requête PDO
            echo "Désolé, une erreur s'est produite. Veuillez réessayer plus tard.";
            return;
        }

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
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
          }
          
        require_once 'vendor/autoload.php';
        require_once 'config.php';
        require_once 'Classes/myjwt.php';
        require_once 'Vues/affiche_connexion.php';
        require_once 'Modeles/traitement_connexion.php';


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
