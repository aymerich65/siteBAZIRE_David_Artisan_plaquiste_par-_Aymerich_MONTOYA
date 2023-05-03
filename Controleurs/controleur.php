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
        //require_once 'Modeles/traitement_connexion.php';
        require_once 'Vues/affiche_connexion.php';
        require_once 'JWT/authentification.php';
var_dump($_SESSION);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = htmlspecialchars($_POST['id']);
            $password = htmlspecialchars($_POST['password']);
            $_SESSION['valeurtest'] = '1';
            var_dump($_SESSION);
        
            
        if (isset($id) && isset($password)) {
                $statement = $pdo->prepare("SELECT * FROM administrateurs WHERE id = :id");
                $statement->bindValue(':id', $id);
                if ($statement->execute()) {
                    $user = $statement->fetch(PDO::FETCH_ASSOC);
                    if ($user === false) {
                        echo 'Identifiant invalide';
                        echo '<div class="button-container mytestcolor">';
                        echo '<a href="../../index.php?page=accueil"><button >Retour à l\'accueil</button></a>';
                        echo '</div>';
                        exit;
                    } else {
                        if (!password_verify($password, $user['password'])) {
                            echo 'Mot de passe invalide';
                            echo '<div class="button-container mytestcolor">';
                            echo '<a href="../../index.php?page=accueil"><button ">Retour à l\'accueil</button></a>';
                            echo '</div>';
                            exit;
        
                        } else {
        
        
                            //Premiere partie
                            //On créer le header
                            $header = [
                                'typ' => 'JWT',
                                'alg' => 'HS256'
                            ];
        
                            //Deuxième partie
                            //On créer le contenu(payload)
                            $payload = [
                                'user_id' => 01,
                                'roles' => ['ROLES_ADMIN', 'ROLES_ADMIN2'],
                            ];
        
                            // On instancie le jeton    
                            $jwt = new JWT();
                            $token = $jwt->generate($header, $payload, SECRET);

                            // On stocke le jeton JWT dans la session pour une utilisation ultérieure
                            $_SESSION['jwt'] = $token;
                            $_SESSION['admin'] = 'approuved';
                            //echo $_SESSION['jwt'];
                            var_dump(SECRET);
                            

                            // On ajoute le jeton JWT dans le header de la réponse
                            //header('Authorization: Bearer ' . $token);

                            
                            //print_r($_SESSION['jwt']); // Vérification du jeton dans la session
        
                           // echo '<script>alert("Bienvenue administrateur!")</script>';
        
                           // echo "<script>window.location.href='/index.php?page=admin'</script>";
        
                            //exit;
                        }
                    }
                }
            }
        } 
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
