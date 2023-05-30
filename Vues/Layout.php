<!DOCTYPE html>
<html lang="fr">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Spécialiste en isolation placo et pose de menuiseries en intérieur et en extérieur. Expérience de plus de 20 ans dans le secteur du bâtiment. Solutions efficaces pour vos projets de construction et de rénovation.">
    <meta name="keywords" content="isolation placo, menuiseries, pose de parquet, construction, rénovation">
    <meta name="robots" content="index, follow">
    <link rel="apple-touch-icon" sizes="180x180" href="elementsgraphiques/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="elementsgraphiques/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="elementsgraphiques/favicon-16x16.png">
    <link rel="manifest" href="elementsgraphiques/site.webmanifest">
    <title><?php echo $titrePage; ?></title>
    <link rel="stylesheet" href="../CSS/bootstrap.css">
    <link rel="stylesheet" href="CSS/style.css">
    </head>
<body>
<body class="">

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