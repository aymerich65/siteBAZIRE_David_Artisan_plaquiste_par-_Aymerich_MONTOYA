<?php

require 'vendor/autoload.php';

$mail = new PHPMailer\PHPMailer\PHPMailer();

/* récupération des variables du formaulaire:*/
$nom = isset($_POST['nom']) ? htmlspecialchars(trim($_POST['nom'])) : '';
$email = isset($_POST['email']) ? htmlspecialchars(trim($_POST['email'])) : '';
$sujet = isset($_POST['sujet']) ? htmlspecialchars(trim($_POST['sujet'])) : '';
$message = isset($_POST['message']) ? htmlspecialchars(trim($_POST['message'])) : '';

//var_dump($nom, $email, $sujet, $message);

/*Configurer l'envoi de l'e-mail*/

$mail->setFrom($email, $nom);
$mail->addAddress('aymaman6576@gmail.com', 'Administrateur');
$mail->Subject = $sujet;
$mail->Body = $message;

/*Envoyer l'e-mail*/
if(!$mail->send()) {
    echo 'Erreur : ' . $mail->ErrorInfo;
} else {
    echo 'E-mail envoyé !';
}
