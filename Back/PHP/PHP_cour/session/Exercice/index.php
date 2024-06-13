<?php
session_start();
echo "<pre>";
echo print_r($_SESSION);
echo "</pre>";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <h1>Page <br> d'ACCUEIL</h1>
    <br><br>
    <p>
        <?php

        // Récupérer les informations de l'URL

        if (isset($_SESSION['login']) && isset($_SESSION['mdp'])) {
            echo "Nom d'utilisateur : " . $_SESSION['login'] . "<br>";
            echo "Mot de passe : " . $_SESSION['mdp'];
        } else {
            echo "Aucune information de connexion disponible.";
        }

        ?>

    </p>
</body>

</html>