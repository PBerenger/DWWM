<?php
require_once __DIR__ . '../../Models/AuthManager.class.php';
require_once __DIR__ . '../../Controllers/UserController.class.php';

$authManager = new AuthManager();
$authManager->startSession();
$userController = new UserController();

// Récupère les informations de l'utilisateur connecté
$user = $userController->getUserInfo();

// Vérifie si l'utilisateur est connecté et si l'alerte a déjà été affichée
if (isset($_SESSION['id_user']) && !isset($_SESSION['alert_show'])) {
    // Stocke dans la session que l'alerte a été affichée
    $_SESSION['alert_show'] = true;
    $alertMessage = "Vous êtes bien connecté en tant que " . htmlspecialchars($user['u_fname'] . ' ' . htmlspecialchars($user['u_lname']));
} else {
    $alertMessage = null;
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/general.css">
    <link rel="stylesheet" href="../public/css/accueil.css">
    <link rel="stylesheet" href="../public/css/informations.css">
    <link rel="stylesheet" href="../public/css/add.css">
    <link rel="stylesheet" href="../public/css/login.css">
    <link rel="stylesheet" href="../public/css/read.css">
    <link rel="stylesheet" href="../public/css/delete.css">
    <link rel="stylesheet" href="../public/css/questionnaire.css">
    <link rel="stylesheet" href="../public/css/traitementQuestionnaire.css">
    <link rel="stylesheet" href="../public/css/profil.css">
    <title>Super 7 V0.2</title>
</head>

<body>
    <header>
        <img class="logoS7" src="../public/img/logos/logoSuper7SF_v2.png" alt="logo_Super7">

        <nav>
            <ul>
                <li><a href="./accueil">Accueil</a></li>
                <li><a href="./informations">Informations</a></li>
                <li><a href="./games">Jeux</a></li>

                <?php if (isset($_SESSION['id_user'])) : ?>
                    <?php if ($alertMessage): ?>
                        <script>
                            // Affiche une alerte lorsque l'utilisateur est connecté
                            alert('<?= $alertMessage; ?>');
                        </script>
                    <?php endif; ?>

                    <?php if ($userController->isAdmin()) : ?>
                        <li class="userButt"><a href="./read">Administrateur</a></li>
                    <?php endif; ?>
                    <div class="profil-conn">
                        <li class="userButt"><a href="./logout">Déconnexion</a></li>
                        <li class="userButt">
                            <a href="./profil">Mon profil : <?= htmlspecialchars($user['u_fname']); ?></a>
                        </li>
                    </div>
                <?php else : ?>
                    <li class="userButt"><a href="./add">Inscription</a></li>
                    <div class="profil-conn">
                        <li class="userButt"><a href="./login">Connexion</a></li>
                        <li class="noConn">Non connecté</li>
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
