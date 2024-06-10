<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="formulaire">
        <h2>Formulaire d'inscription</h2>
        <br>
        <form action="index.php" method="POST">
            <!-- NOM -->
            <div class="part1">
                <label class="titre1" for="nomComplet">Nom Complet : </label>
                <br>
                <label class="titre 2" for="prenomC">Prénom : </label>
                <br>
                <input type="text" name="prenomC" id="prenom">
                <br>
                <label class="titre 2" for="nomC">Nom : </label>
                <br>
                <input type="text" name="nomC" id="nom">
                <br><br>
                <!-- EMAIL -->
                <label class="titre 2" for="email">Email : </label>
                <br>
                <input type="text" name="email" id="email" value="">
                <br><br>
                <!-- MDP -->
                <label class="titre 2" for="mdp">Mot de passe : </label>
                <br>
                <input type="text" name="mdp" id="mdp" value="">
                <br><br>
                <!-- MDP CONFIRMATION -->
                <label class="titre 2" for="mdpConf">Confirmation du mot de passe : </label>
                <input type="text" name="mdpConf" id="mdpConf" value="">
                <br><br>
            </div>

            <div class="part2">
                <!-- DATE DE NAISSANCE -->
                <label class="titre 2" for="date">Date de naissance : </label>
                <input type="date" name="date" id="date" value="date">
                <br><br>
            </div>

            <div class="part3">
                <!-- GENRE -->
                <label class="titre1" for="nomComplet">Genre :</label>
                <br>
                <input type="radio" id="option1" name="genre" value="homme" checked>
                <label class="titre 2" for="option1">Homme</label>
                <br>
                <input type="radio" id="option2" name="genre" value="femme">
                <label class="titre 2" for="option2">Femme</label>
                <br>
                <input type="radio" id="option3" name="genre" value="nonBinaire">
                <label class="titre 2" for="option3">Non binaire</label>
                <br><br><br>
                <div class="valider">
                    <input type="submit" value="Valider">
                </div>
            </div>

        </form>
    </div>

    <!-- Vérification "nom complet" -->
    <?php

    if (isset($_POST["prenomC"]) && isset($_POST["nomC"])) {
        $prenomC = $_POST["prenomC"];
        $nomC = $_POST["nomC"];
        $prenomC = filter_input(INPUT_POST, "prenom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $nomC = filter_input(INPUT_POST, "nom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if (empty($_POST[$prenomC]) && empty($_POST[$nomC])) {
            echo "Nom complet invalide : Veuillez entrer votre prénom et votre nom.\n\n";
        } else {
            echo "Votre nom complet est : " . htmlspecialchars($prenomC) . " " . htmlspecialchars($nomC) . ".\n\n";
        }
    }

    // Vérification chiffre ?
    if (isset($_POST["prenomC"]) && isset($_POST["nomC"])) {
        $prenomC = $_POST["prenomC"];
        $nomC = $_POST["nomC"];
        if (is_numeric($_POST['prenomC']) || is_numeric($_POST["nomC"])) {
            echo 'Invalide : chiffres interdits ici.';
        } else {
            echo "";
        }
    }
    ?>



    <!-- Vérification email -->
    <?php
    $email = "";
    if (isset($_POST["email"])) {
        $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
        //verifier validité Email
        if ($email) {
            echo "<p> Votre adresse mail est : $email </p>\n\n";
        } else {
            echo "<p>Email invalide : format Email incorrect.</p>\n\n";
        }
    }
    ?>

    <!-- Vérification corrélation des MDP -->

    <?php
    $mdp = "mdp";
    $mdpConf = "mdpConf";

    if (isset($_POST["mdp"]) && isset($_POST["mdpConf"])) {

        if ($mdp != $mdpConf) {
            echo "Mots de passe invalides : les mots de passe de correspondent pas.\n\n";
        } else {
            echo "Vos mots de passe se ressemblent.\n\n";
        }
    }

    ?>



    <!-- Vérification genre -->
    <?php
    if (isset($_POST["genre"])) {
        $genre = $_POST["genre"];
        $op1 = "option1";
        $op2 = "option2";
        $op3 = 'option3';
        if ($genre == $op1 || $genre == $op2 || $genre == $op3) {
            echo "Vous avez selectionner : " . htmlspecialchars($genre) . "\n\n";
        } else {
            echo "<p>Genre invalide : aucune option sélectionnée.</p>" . "\n\n";
        }
    }

    ?>

</body>

</html>