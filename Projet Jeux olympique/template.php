<?php
if (session_status() == PHP_SESSION_NONE) session_start();
//ou
// if(session_status()==PHP_SESSION_NONE){
//     session_start();
// }
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>jo_skateboard2024bady</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <nav class="connection">
            <div class="logo2"><img src="/img/all/logo2.jpg" alt=""></div>
            <li><a href="create.php">S'inscrire</a></li>
            <?php
            if (isset($_SESSION["user_id"])) :
            ?>
                <li><a href="logout.php">Déconnection</a></li>
            <?php else : ?>
                <li><a href="login.php">Login</a></li>
            <?php endif; ?>

        </nav>
        <nav class="navigation">
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="read.php">Voir les utilisateurs (admin)</a></li>
                <li><a href="update.php">Modifier/Supprimer un utilisateur</a></li>
                <li><a href="delete.php">Supprimer un utilisateur</a></li>
            </ul>

        </nav>
    </header>



    <script src="js.js"></script>

    <div class="content">
        <?= $content ?>
    </div>

    <footer>
        <div class="foot1"></div>
        <div class="foot2">
            <div class="logoF"><img src="/img/all/Paris2024_Olywhiteleft.png" alt=""></div>
            <ul>
                <li>POMMELET Bérenger</li>
                <li>Plan du site</li>
                <li>Copyright</li>
            </ul>
        </div>
    </footer>
</body>

</html>