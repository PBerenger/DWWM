<?php
require_once __DIR__ . '../../Models/AuthManager.class.php';
require_once __DIR__ . '../../Controllers/UserController.class.php';
$authManager = new AuthManager();
$authManager->startSession();
$userController = new UserController();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/style.css">
    <title>Super 7 V0.2</title>
</head>

<body>
    <header>
        <img class="logoS7" src="../public/img/logos/logoSuper7SF_v2.png" alt="logo_Super7">

        <nav>
            <ul>
                <li><a href="./accueil">Accueil</a></li>
                <li><a href="./Informations">Informations</a></li>
                <li><a href="./Games">Jeux</a></li>
                <!-- Login Butt -->
                <?php if (isset($_SESSION['id_user'])) : ?>
                    <?php if ($userController->isAdmin()) : ?>
                        <li class="userButt"><a href="./read">Administrateur</a></li>
                    <?php endif; ?>
                    <div class="profil&con">
                        <li class="userButt"><a href="./logout">Déconnexion</a></li>
                        <li class="userStat">
                            <a href="./update/<?= htmlspecialchars($_SESSION['id_user']) ?>">
                                <?= htmlspecialchars($userController->getUserName()) ?> <!-- Afficher le nom -->
                            </a>
                        </li>
                    </div>
                <?php else : ?>
                    <li class="userButt"><a href="./add">Inscription</a></li>
                    <div class="profil&con">
                        <li class="userButt"><a href="./login">Connexion</a></li>
                        <li class="userStat">Non connecté</li>
                    </div>

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