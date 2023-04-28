<?php

// Inclure la bibliothèque SendGrid via Composer
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config.php';

// Créer un nouvel objet SendGrid\Mail\Mail
$email = new \SendGrid\Mail\Mail();

// Récupérer les données du formulaire
$nom = isset($_POST['nom']) ? htmlspecialchars(trim($_POST['nom'])) : '';
$email_address = isset($_POST['email']) ? htmlspecialchars(trim($_POST['email'])) : '';
$sujet = isset($_POST['sujet']) ? htmlspecialchars(trim($_POST['sujet'])) : '';
$message = isset($_POST['message']) ? htmlspecialchars(trim($_POST['message'])) : '';

// Configuration de l'e-mail
$email->setFrom($email_address, $nom);
$email->addTo('aymaman6576@gmail.com', 'Administrateur');
$email->setSubject($sujet);
$email->addContent('text/plain', "Nom de l'expéditeur : " . $nom . "\nAdresse e-mail de l'expéditeur : " . $email_address . "\n\n" . $message);

// Configuration de l'API SendGrid
$apiKey = SENDGRID_API_KEY;
$sendGrid = new \SendGrid($apiKey);

// Envoyer l'e-mail via l'API SendGrid
try {
    $response = $sendGrid->send($email);
    echo "E-mail envoyé avec succès !";
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}

