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
        <title>Epreuve de Skateboard - JO2024</title>
    </head>
    
    <body>
        <header>
            <img class="imgLogo" src="<?= URL ?>public/images/all/Paris2024_Olywhiteleft.png" alt="Logo" class="nav-logo">
            <nav>
                <ul>
        <li><a href="<?= URL ?>accueil">Accueil</a></li>
        <li><a href="<?= URL ?>calendrier">Calendrier</a></li>
        <li><a href="<?= URL ?>classement">Classement</a></li>
        <li><a href="<?= URL ?>athletes">Athlètes</a></li>

        <?php if (isset($_SESSION['user_id'])) : ?>
            <?php if ($userController->isAdmin()) : ?>
                <li class="userButt"><a href="<?= URL ?>read">Administration</a></li>
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
        <div class="rotating-image"></div>
    </header>

    <?= $content ?>
    
    <footer>
        <p class="foot">Copyright POMMELET Bérenger - 2024</p>
    </footer>
    
    <script src="<?= URL ?>public/js/script.js"></script>
</body>
</html>