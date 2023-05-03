
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = htmlspecialchars($_POST['id']);
    $password = htmlspecialchars($_POST['password']);


    
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
                    // On ajoute le jeton JWT dans le header de la réponse
                    header('Authorization: Bearer ' . $token);
                    // On stocke le jeton JWT dans la session pour une utilisation ultérieure
                    $_SESSION['jwt'] = $token;

                    //echo $token;

                    $_SESSION['admin'] = 'approuved';
                    //var_dump($_SESSION['jwt']); // Vérification du jeton dans la session

                    echo '<script>alert("Bienvenue administrateur!")</script>';

                    echo "<script>window.location.href='/index.php?page=admin'</script>";

                    exit;
                }
            }
        }
    }
}
