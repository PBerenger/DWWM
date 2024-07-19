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
    <title>Répertoire - POO - MVC</title>
</head>

<body>
    <header>
        <img src="<?= URL ?>public/images/logo.png" alt="Logo" class="nav-logo">
        <nav>
            <ul>
                <li><a href="<?= URL ?>accueil">Accueil</a></li>
                <li><a href="<?= URL ?>accueil">Calendrier</a></li>
                <li><a href="<?= URL ?>accueil">Classement</a></li>
                <li><a href="<?= URL ?>accueil">Athlètes</a></li>
                <div class="Loginout">
                    <?php if (isset($_SESSION['user_id'])) : ?>
                        <?php if ($userController->isAdmin()) : ?>
                            <li><a href="<?= URL ?>read">Administration</a></li>
                        <?php else : ?>
                            <li><a href="<?= URL ?>update/<?= htmlspecialchars($_SESSION['user_id'])?>" >Modification du profil</a></li>
                        <?php endif; ?>
                        <li><a href="<?= URL ?>logout">Déconnexion</a></li>
                    <?php else : ?>
                        <li><a class="validButton" href="<?= URL ?>add">Inscription</a></li>
                        <li><a href="<?= URL ?>login">Connexion</a></li>
                    <?php endif; ?>
                </div>

            </ul>
        </nav>
    </header>
    <h1><?= $titre ?></h1>
    <?= $content ?>

    <footer>
        <p class="foot">Copyright AFCI - 2024</p>
    </footer>
</body>

</html>