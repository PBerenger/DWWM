<?php  ob_start();?>

<?php
$nom = "";
$email = "";
$mdp = "";
$validation = true;

?>

<form action="login.php" method="POST">

    <label for="nom">Nom :</label>
    <input type="text" name="nom" id="nom" value="<?= htmlspecialchars($nom) ?>" required>

    <label for="email">Email :</label>
    <input type="email" name="email" id="email" value="<?= htmlspecialchars($email) ?>" required>

    <label for="mdp">Mot de passe :</label>
    <input type="password" name="mdp" id="mdp" minlength="8" value="<?= htmlspecialchars($mdp) ?>" required>

    <input type="submit" value="Envoyer">
</form>


<?php

if (isset($_POST['nom'])) {
    $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if (!ctype_alpha($nom)) {
        echo "<p>Le nom n'est pas valide</p>";
    }
}

//----------------------------------------------------------VERFIFICATION EMAIL--------------------------------------------------

if (isset($_POST['email'])) {
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

    // Verifier si l'email est valide

    if (!$email) {
        echo "<p>L'adresse email non valide</p>";
        $validation = false;
    }
}
//----------------------------------------------------------VERFIFICATION MDP--------------------------------------------------

$longueur = 8;

if (isset($_POST['mdp'])) {
    $mdp = filter_input(INPUT_POST, 'mdp', FILTER_DEFAULT);

    if (strlen($mdp) < $longueur) {
        echo "<p>Votre mot de passe est trop court ! Veuillez avoir 8 caractéres minimum</p>";
        $validation = false;
    }
}
if ($validation && $email && $mdp && $nom) {
    session_start();

    $_SESSION['username'] = $nom;
    $_SESSION['mail'] = $email;

    if(isset($_SESSION['username'])){
    echo "Vous étes connecté, vous allez être redirigez vers la page d'accueil";
    header("Location: index.php");
            exit();
    }else{
    echo "Veuillez vous connecter";
    }

}

    ?>
    

<?php
    $content = ob_get_clean();
    $titre = "Veuillez vous connectez";
    $title = "Connexion";
    require "traitement.php";
?>