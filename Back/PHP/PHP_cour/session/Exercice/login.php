<?php
session_start();

// Récupérer les données du formulaire
if (isset($_POST['login']) && isset($_POST['mdp'])) {
    $login = $_POST['login'];
    $mdp = $_POST['mdp'];


        // Les informations sont correctes, redirection vers la page d'accueil
        $_SESSION['login'] = $login;
        $_SESSION['mdp'] = $mdp;
        header("Location: index.php");
        exit();

        // Les informations sont incorrectes, afficher un message d'erreur
        // echo "Nom d'utilisateur ou mot de passe incorrect.";
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulaire de connexion</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="formulaire">
        <h2>Formulaire de connection</h2>
        <br>
        <form action="login.php" method="POST">
            <!-- NOM -->
            <div class="part1">
                <p>Veuillez entrer votre login et votre mot de passe :</p>
                <br>
                <label class="titre 2" for="login">Login : </label>
                <br>
                <input type="text" name="login" id="login">
                <br><br>

                <!-- MDP -->
                <label class="titre 2" for="mdp">Mot de passe : </label>
                <br>
                <input type="text" name="mdp" id="mdp" value="">
                <br>
            </div>

            <div class="buttonValid">
                <input type="submit" value="Valider">
            </div>
        </form>
    </div>




</body>

</html>