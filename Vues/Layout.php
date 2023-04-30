<!DOCTYPE html>
<html lang="fr">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/bootstrap.css">
    <link rel="stylesheet" href="CSS/style.css">
    </head>
<body>
<body class="container-fluid">

<header class="">
    <?php require_once 'affiche_Header.php'; ?>
</header>

<main >
    <?php
    echo $contenu;
    ?>
</main>

<footer >
<?php require_once 'affiche_Pied_de_page.php'; ?>
</footer>
  <script src="../JS/bootstrap.bundle.min.js"></script>  
</body>
</html>