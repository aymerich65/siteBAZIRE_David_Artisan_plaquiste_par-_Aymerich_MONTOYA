<?php

require_once '../Classes/myjwt.php';
require_once '../Includes/cles.php';

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
//echo $token;
//echo 
$secret = base64_encode(SECRET);
//echo  $secret;

var_dump($jwt);