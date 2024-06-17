<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Formulaire de connexion</h2>
        <form action="login.php" method="post">
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required>

            <input type="submit" value="Se connecter">
        </form>
    </div>
</body>
</html>

<?php
require_once "dbConnect.php";

// pour vérifier le MDP (https://www.php.net/manual/en/function.password-verify.php)

if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    

    var_dump($email);
    var_dump($password);

    // Préparation de la requête On vérifie le mot de passe correspondant au mail dans la base de donnée
    $req = $db->prepare('SELECT password FROM users WHERE email = :email');

    // On associe les valeurs $email au pâramètre ":email"
    $req->bindValue('email', $email);
    // On execute
    $req->execute();
    // On récupère le résultat
    $resultat = $req->fetch(PDO::FETCH_ASSOC);

    var_dump($resultat);

    // Vérification du mot de passe :
        // - Si $resultat n'est pas vide, c'est-à-dire que l'email existe dans la base de données.
        // - Si la fonction password_verify renvoie true, c'est-à-dire que le mot de passe fourni par l'utilisateur correspond au mot de passe haché stocké dans la base de données.
    if($resultat && password_verify($password, $resultat['password'])){
        echo "Connexion réussie !";
    }else{
         echo "Identifiants ou mot de passe invalides";
    }
}
?>
