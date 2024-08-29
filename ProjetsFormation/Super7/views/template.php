<?php
$authManager = new AuthManager();
$authManager->startSession();
$userController = new UserController();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= URL ?>public/css/style.css">
    <title>Super 7 V0.1</title>
</head>

<body>
    <header>
        <img class="logoS7" src="../public/img/logos/logoSuper7SF_v2.png" alt="logo_Super7">
        <nav>
            <ul>
                <li><a href="<?= URL ?>accueil">Accueil</a></li>
                <li><a href="<?= URL ?>Informations">Informations</a></li>
                <li><a href="<?= URL ?>Games">Jeux</a></li>
                <!-- Login Butt -->
                <?php if (isset($_SESSION['user_id'])) : ?>
                    <?php if ($userController->isAdmin()) : ?>
                        <li class="userButt"><a href="<?= URL ?>read">Administrateur</a></li>
                    <?php else : ?>
                        <li class="userButt"><a href="<?= URL ?>update/<?= htmlspecialchars($_SESSION['user_id']) ?>">Profil</a></li>
                    <?php endif; ?>
                    <li class="userButt"><a href="<?= URL ?>logout">Déconnexion</a></li>
                <?php else : ?>
                    <li class="userButt"><a href="<?= URL ?>add">Inscription</a></li>
                    <li class="userButt"><a href="<?= URL ?>login">Connexion</a></li>
                <?php endif; ?>

            </ul>
        </nav>
    </header>

    <?= $content ?>

    <footer>
        <p class="foot">Copyright SUPER7</p>
        <p class="foot">POMMELET Bérenger</p>
        <p class="foot">- 2024 -</p>
    </footer>

    <script src="<?= URL ?>public/js/script.js"></script>
</body>

</html>