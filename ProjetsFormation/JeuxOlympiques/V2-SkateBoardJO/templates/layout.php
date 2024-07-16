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
            <div class="logo2"><img src="/ressources/img/all/logo2.jpg" alt="Logo"></div>

            <li><a href="index.php?action=connexion">Connexion</a></li>
            <!-- <?php if (isset($_SESSION["user_id"])) : ?>
                <li><a href="index.php?action=logout">Déconnexion</a></li>
            <?php else : ?>
                <li><a href="index.php?action=login">Login</a></li>
            <?php endif; ?> -->
        </nav>
        <nav class="navigation">
            <ul>
                <li><a href="index.php?action=homepage">Accueil</a></li>
                <?php if (isset($_SESSION["user_role"]) && $_SESSION["user_role"] === "admin") : ?>
                    <li><a href="index.php?action=readUsers">Voir les utilisateurs (admin)</a></li>
                    <li><a href="index.php?action=updateUser">Modifier/Supprimer un utilisateur</a></li>
                    <li><a href="index.php?action=deleteUser">Supprimer un utilisateur</a></li>
                    <li><a href="index.php?action=admin">Espace administrateur</a></li>
                <?php endif; ?>
                <li><a href="index.php?action=athletes">Athlètes</a></li>
                <li><a href="index.php?action=event">Évènements</a></li>
            </ul>
        </nav>
    </header>

    <?= $content ?>

    <footer>
        <div class="foot1"></div>
        <div class="foot2">
            <div class="logoF"><img src="/ressources/img/all/Paris2024_Olywhiteleft.png" alt="Logo"></div>
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
