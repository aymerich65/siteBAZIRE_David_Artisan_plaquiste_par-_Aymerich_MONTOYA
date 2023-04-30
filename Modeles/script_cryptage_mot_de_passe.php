<?php

$password = "";


$hashed_password = password_hash($password, PASSWORD_DEFAULT);


echo "Mot de passe crypté : " . $hashed_password;
?>
