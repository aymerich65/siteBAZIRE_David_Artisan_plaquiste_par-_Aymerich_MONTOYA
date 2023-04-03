<?php

    class MyControleurs {
        public function pageAccueil() {
            $header = require_once 'Vues/affiche_Header.php';            
            $main = require_once 'Vues/affiche_Accueil.php';
            $footer = require_once 'Vues/affiche_Pied_de_page.php';

            require_once 'Vues/layout.php';
        }

        public function pageContact() {
            $header = require_once 'Vues/affiche_Header.php';            
            $main = require_once 'Vues/affiche_Contact.php';
            $footer = require_once 'Vues/affiche_Pied_de_page.php';

            require_once 'Vues/layout.php';
        }
    }
    


  
