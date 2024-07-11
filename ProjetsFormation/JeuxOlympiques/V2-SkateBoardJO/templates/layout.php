<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title><?= $title ?></title>
    <link href="../style.css" rel="stylesheet" />
</head>



<body>

    <header>
        <nav class="connection">
            <div class="logo2"><img src="/img/all/logo2.jpg" alt=""></div>

            <li><a href="templates/connection.php">Connexion</a></li>
            <!-- <?php
                    if (isset($_SESSION["user_id"])) :
                    ?>
                <li><a href="logout.php">Déconnexion</a></li>
            <?php else : ?>
                <li><a href="login.php">Login</a></li>
            <?php endif; ?> -->
        </nav>
        <nav class="navigation">
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <?php if (isset($_SESSION["user_role"]) && $_SESSION["user_role"] === "admin") : ?>
                    <li><a href="templates/read.php">Voir les utilisateurs (admin)</a></li>
                    <li><a href="templates/update.php">Modifier/Supprimer un utilisateur</a></li>
                    <li><a href="delete.php">Supprimer un utilisateur</a></li>
                    <li><a href="admin">Espace administrateur</a></li>
                <?php endif; ?>
                <li><a href="athletes">Athlètes</a></li>
                <li><a href="event">Évènements</a></li>
            </ul>
        </nav>

    </header>


    <?= $content ?>


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

    <script src="js.js"></script>

</body>

</html>