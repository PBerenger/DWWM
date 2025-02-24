<?php session_start();
// var_dump($_SESSION);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle ?? 'ResaR') ?></title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/home.css">
    <link rel="stylesheet" href="/css/error-success.css">
    <link rel="stylesheet" href="/css/restaurants.css">
    <link rel="stylesheet" href="/css/restaurant-details.css">
    <link rel="stylesheet" href="/css/registerRestaurant.css">
</head>

<body>
    <header>
        <nav>
            <button class="logo1" onclick="window.location.href='?page=home'">
                <img src="assets/logo/logo1.png" alt="Logo-txt Accueil">
                <img src="assets/logo/logo2.1.png" alt="Logo-img Accueil">
            </button>
            <ul>
                <li>
                    <button id="btn-general" onclick="window.location.href='?page=restaurants-list'" title="Liste des restaurants">Restaurants</button>
                </li>
                <li>
                    <?php if (!isset($_SESSION['user_id'])): ?>
                        <button id="btn-general" onclick="window.location.href='?page=register-restaurant'" title="Inscrire mon restaurant">Vous êtes restaurateur</button>
                    <?php elseif (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                        <button id="btn-general" onclick="window.location.href='?page=admin'" title="Accéder à l'administration du site">Administration</button>
                    <?php elseif (isset($_SESSION['role']) && $_SESSION['role'] === 'client'): ?>
                        <button id="btn-general" onclick="window.location.href='?page=myProfil'" title="Modifier mes informations">Profil</button>
                    <?php elseif (isset($_SESSION['role']) && $_SESSION['role'] === 'owner'): ?>
                        <button id="btn-general" onclick="window.location.href='?page=myRestaurant' " title="Modifier mon restaurant">Mon restaurant</button>
                    <?php endif; ?>
                </li>

                <!-- Bouton Déconnexion -->
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li>
                        <button id="btn-general" onclick="window.location.href='?page=logout'" title="Déconnectez-vous">Déconnexion</button>
                    </li>
                <?php else: ?>
                    <!-- Bouton Connexion -->
                    <li>
                        <button id="btn-general" class="open-register" title="Connectez-vous ou inscrivez-vous">Connexion</button>
                    </li>
                <?php endif; ?>


                <!-- Affichage du smiley pour indiquer l'état de la connexion -->
                <li class="user-status" title="<?= isset($_SESSION['user_id']) ? 'Vous êtes connecté' : "Vous n'êtes pas connecté" ?>">
                    <?php if (isset($_SESSION['user_id'])): ?>
                        🤗 <!-- Smiley heureux si connecté -->
                    <?php else: ?>
                        😴 <!-- Smiley triste si non connecté -->
                    <?php endif; ?>
                </li>

                <li class="search-bar-nav">
                    <form method="GET" action="index.php?page=search">
                        <input type="text" name="search" placeholder="Rechercher un restaurant..." id="search-input" value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>" title="Recherchez un restaurant">
                    </form>
                </li>
                <li>
                    <button id="dark-mode-toggle" title="Thème Sombre/clair">☀️</button>
                </li>
            </ul>
        </nav>
    </header>

    <div id="register-menu" class="register-menu">
        <button id="close-register" class="close-btn">&times;</button>
        <img class="logo2" src="assets/logo/logo2.2.png" alt="Logo-img Accueil">
        <h1><span class="miroir-h">R</span>es<span class="miroir-xy">e</span>R</h1>

        <h2>Connexion</h2>

        <!-- Affichage des erreurs -->
        <?php if (!empty($validationError)): ?>
            <div class="error-message"><?= htmlspecialchars($validationError) ?></div>
        <?php endif; ?>

        <!-- stockage des erreurs -->
        <?php if (!empty($_SESSION['error_message'])): ?>
            <div class="error-message"><?= htmlspecialchars($_SESSION['error_message']) ?></div>
            <?php unset($_SESSION['error_message']); ?>
        <?php endif; ?>

        <form method="POST" action="?page=login-user">
            <input type="hidden" name="csrf_token" value="<?= isset($_SESSION['csrf_token']) ? $_SESSION['csrf_token'] : '' ?>">
            <input type="email" name="email" placeholder="Email" value="bou.ba@gmail.com" required>
            <input type="password" name="password" placeholder="Votre mot de passe" value="Password@123" required>
            <button type="submit" name="loginSubmit">Se connecter</button>
        </form>

        <p>ou</p>
        <button class="google-signin">Se connecter avec Google</button>

        <h2>Inscription</h2>

        <!-- Affichage des erreurs -->
        <?php if (!empty($validationError)): ?>
            <div class="error-message"><?= htmlspecialchars($validationError) ?></div>
        <?php endif; ?>

        <!-- stockage des erreurs -->
        <?php if (!empty($_SESSION['error_message'])): ?>
            <div class="error-message"><?= htmlspecialchars($_SESSION['error_message']) ?></div>
            <?php unset($_SESSION['error_message']); ?>
        <?php endif; ?>

        <form method="POST" action="?page=register-user">
            <input type="hidden" name="csrf_token" value="<?= isset($_SESSION['csrf_token']) ? $_SESSION['csrf_token'] : '' ?>">
            <input type="text" name="prenom" placeholder="Prénom" value="Bou" required>
            <input type="text" name="nom" placeholder="Nom" value="Ba" required>
            <input type="email" name="email" placeholder="Email" value="bou.ba@gmail.com" required>
            <input type="password" name="password" placeholder="Votre mot de passe" value="Password@123" required>
            <input type="password" name="passwordRepeat" placeholder="Confirmation du mot de passe" value="Password@123" required>
            <button type="submit" name="userSubmit">S'inscrire</button>
        </form>
    </div>

    <main>
        <?= $content ?? '<p>Contenu introuvable. Veuillez sélectionner une page valide.</p>' ?>
    </main>

    <footer>
        <p>&copy; <?= date('Y') ?> ResaR. Tous droits réservés.</p>
    </footer>

    <script src="./scripts/layout.js"></script>
</body>

</html>