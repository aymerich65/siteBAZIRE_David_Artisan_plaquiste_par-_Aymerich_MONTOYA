<?php
$pdo = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
             
             $myrequest = $pdo->prepare('SELECT * FROM galerie_images');
             $myrequest->execute();
             $mybddTable = $myrequest->fetchAll(PDO::FETCH_ASSOC);  
             $imageFolder = '';