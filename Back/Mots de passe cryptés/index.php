<!DOCTYPE html>
<html>
<head>
    <title>Accueil</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Bienvenue sur notre site</h1>
        <p>Veuillez vous inscrire ou vous connecter.</p>
        <a href="inscription.php">Inscription</a>
        <a href="login.php">Connexion</a>
    </div>
</body>
</html>

<?php
// MD5 --- OBSOLETE
$password = "1234";
$passwordHash = md5($password);
var_dump($password);
var_dump($passwordHash);

echo "===========================================================================================================================================<br>";

// SHA256 -- la string peut être changée pour un autre cryptage (https://www.php.net/manual/fr/function.hash.php)
$password = "1234";
$passwordHash = hash("snefru", $password);
var_dump($password);
var_dump($passwordHash);

echo "===========================================================================================================================================<br>";

// password_hash --- PASSWORD_DEFAULT est le plus utilisé!!! (https://www.php.net/manual/fr/function.password-hash.php)
$password = "1234";
$passwordHash = password_hash($password, PASSWORD_DEFAULT);
var_dump($password);
var_dump($passwordHash);

echo "===========================================================================================================================================<br>";

?>