<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle ?? 'ResaR') ?></title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/error-success.css">
    <link rel="stylesheet" href="/css/restaurants.css">
    <link rel="stylesheet" href="/css/restaurant-details.css">
    <link rel="stylesheet" href="/css/home.css">

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
                    <button id="btn-general" onclick="window.location.href='?page=restaurants'">Restaurants</button>
                </li>
                <li>
                    <button id="btn-general" onclick="window.location.href='?page=login'">Je suis restaurateur</button>
                </li>
                <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                    <li>
                        <button id="btn-general" onclick="window.location.href='?page=admin_restaurant'">Admin</button>
                    </li>
                <?php endif; ?>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li>
                        <button id="btn-general" onclick="window.location.href='logout.php'">Déconnexion</button>
                    </li>
                <?php endif; ?>
                <li>
                    <button id="btn-general" class="open-register">Connexion</button>
                </li>
                <li class="search-bar-nav">
                    <form method="GET" action="index.php?page=search">
                        <input type="text" name="search" placeholder="Rechercher un restaurant..." id="search-input" value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
                    </form>
                </li>
                <li>
                    <button id="dark-mode-toggle">☀️</button>
                </li>
            </ul>
        </nav>
    </header>

    <div id="register-menu" class="register-menu">
        <button id="close-register" class="close-btn">&times;</button>
        <img class="logo2" src="assets/logo/logo2.2.png" alt="Logo-img Accueil">
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
            <input type="text" name="prenom" placeholder="Prénom" value="Bou" required>
            <input type="text" name="nom" placeholder="Nom" value="Ba" required>
            <input type="email" name="email" placeholder="Email" value="bou.ba@gmail.com" required>
            <input type="password" name="password" placeholder="Votre mot de passe" value="Password@123" required>
            <input type="password" name="passwordRepeat" placeholder="Confirmation mot de passe" value="Password@123" required>
            <button type="submit">S'inscrire</button>
        </form>
        <p>ou</p>
        <button class="google-signin">Se connecter avec Google</button>

        <!-- <input type="password" id="password" name="password" placeholder="Votre mot de passe" required>
        <div class="password-strength">
            <div id="strength-bar"></div>
            <span id="strength-text">Faible</span>
        </div>
        <input type="password" id="passwordRepeat" name="passwordRepeat" placeholder="Confirmation mot de passe" required>
        <button type="submit" id="register-btn" disabled>S'inscrire</button> -->

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