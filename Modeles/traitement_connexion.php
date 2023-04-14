
<?php
session_start();

require_once __DIR__ . '/../Classes/myjwt.php';
 require_once __DIR__ . '/../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = htmlspecialchars($_POST['id']);
    $password = htmlspecialchars($_POST['password']);

    
    require_once __DIR__ . '/../vendor/autoload.php';
   
    $pdo = new PDO(DB_DSN, DB_USER, DB_PASSWORD);

    if (isset($id) && isset($password)) {
        $statement = $pdo->prepare("SELECT * FROM administrateurs WHERE id = :id");
        $statement->bindValue(':id', $id);
        if ($statement->execute()) {
            $user = $statement->fetch(PDO::FETCH_ASSOC);
            if ($user === false) {
                echo 'Identifiant invalide';
            } else {
                if (!password_verify($password, $user['password'])) {
                    echo 'Mot de passe invalide';
                } else {


 //Premiere partie
//On créer le header
$header = [
    'typ'=> 'JWT',
    'alg'=> 'HS256'
];


 //Deuxièmepartie
//On créer le contenu(payload)
$payload = [
    'user_id' =>01,
    'roles'=>['ROLES_ADMIN','ROLES_ADMIN2']
];

// On instancie le jeton    
$jwt = new JWT();
$token = $jwt->generate($header, $payload, SECRET);
echo $token;






                    $_SESSION['jwt'] = $token;
                    $_SESSION['admin'] = 'approuved';
                    //var_dump($_SESSION['jwt']); // Vérification du jeton dans la session
                //var_dump($_SESSION['admin']); // Vérification de l'approbation de l'administrateur

                    echo '<script>alert("Bienvenue administrateur!")</script>';

                    header('Location: /index.php?page=admin');
                    exit;
                }
            }
        }
    }
}
echo SECRET;