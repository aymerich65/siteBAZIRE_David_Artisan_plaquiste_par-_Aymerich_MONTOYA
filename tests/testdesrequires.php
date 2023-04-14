<?php
require_once '../Classes/myjwt.php';
require_once '../Includes/cles.php';
/* Utilisation du fichier config pour récupérer les variables d'environnement:*/
require_once  '../config.php';
require_once '../vendor/autoload.php';

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
//echo 



