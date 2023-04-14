<?php

    class MyControler {
        public function pageAccueil() {
            $header = require_once 'Vues/affiche_Header.php';            
            $main = require_once 'Vues/affiche_Accueil.php';
            $footer = require_once 'Vues/affiche_Pied_de_page.php';

            require_once 'Vues/layout.php';
        }

        public function pageContact() {
            $action = 'Modeles/traitementmails.php';
            require_once 'Vues/layout.php';
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                require_once 'Modeles/traitementmails.php';


            $header = require_once 'Vues/affiche_Header.php';            
            $main = require_once 'Vues/affiche_Contact.php';
            $footer = require_once 'Vues/affiche_Pied_de_page.php';


            }
        }




        public function pageGalerie() {

/* utilisation du fichier config pour récupérer les variables d'environnement:*/
require_once 'vendor/autoload.php';
require_once 'config.php';


             $pdo = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
             
             $myrequest = $pdo->prepare('SELECT * FROM galerie_images');
             $myrequest->execute();
             $mybddTable = $myrequest->fetchAll(PDO::FETCH_ASSOC);  
             $imageFolder = '';

            $header = require_once 'Vues/affiche_Header.php';   
            $main = require_once 'Vues/affiche_Galerie.php';            
            $footer = require_once 'Vues/affiche_Pied_de_page.php';
            require_once 'Vues/layout.php';


        }



        public function pagePrestations() {
            $header = require_once 'Vues/affiche_Header.php';   
            $main = require_once 'Vues/affiche_Prestations.php';            
            $footer = require_once 'Vues/affiche_Pied_de_page.php';

            require_once 'Vues/layout.php';
        }


        

        public function pageAdmin() {
/* utilisation du fichier config pour récupérer les variables d'environnement:*/
require_once 'vendor/autoload.php';
require_once 'config.php';
require_once 'JWT/validate_jwt.php';

            $pdo = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
             
            $myrequest = $pdo->prepare('SELECT * FROM galerie_images');
            $myrequest->execute();
            $mybddTable = $myrequest->fetchAll(PDO::FETCH_ASSOC);  
            $imageFolder = '';



            $header = require_once 'Vues/affiche_Header.php';   
            $main = require_once 'Vues/affiche_tableau_de_bord.php';            
            $footer = require_once 'Vues/affiche_Pied_de_page.php';

            require_once 'Vues/layout.php';
        }
        public function pageConnexion() {
            require_once 'Modeles/traitement_connexion.php';
            $header = require_once 'Vues/affiche_Header.php';           
            $main = require_once 'Vues/affiche_connexion.php';
            $footer = require_once 'Vues/affiche_Pied_de_page.php';
            
            require_once 'Vues/layout.php';
            require_once 'JWT/authentification.php';
            
        }

        public function pagetest() {
            $header = require_once 'Vues/affiche_Header.php';           
            $main = require_once 'Vues/pagetest';
            $footer = require_once 'Vues/affiche_Pied_de_page.php';

            require_once 'Vues/layout.php';
        }
        public function pageApropos() {
            $header = require_once 'Vues/affiche_Header.php';           
            $main = require_once 'Vues/affiche_Apropos.php';
            $footer = require_once 'Vues/affiche_Pied_de_page.php';

            require_once 'Vues/layout.php';
        }


    }
    


  
