<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle) ?></title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/restaurants.css">
    <link rel="stylesheet" href="/css/restaurant-details.css">
    <link rel="stylesheet" href="/css/home.css">
</head>

<body>
    <!-- En-tête -->
    <header>
        <nav>
            <button class="logo1" onclick="window.location.href='?page=home'">
                <img src="assets/logo/logo1.png" alt="Logo Accueil">
            </button>
            <ul>
                <li><a href="?page=restaurants">Restaurants</a></li>
                <li><a href="?page=login">Connexion</a></li>
                <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                    <li><a href="?page=admin_restaurant">Admin</a></li>
                <?php endif; ?>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="logout.php">Déconnexion</a></li>
                <?php endif; ?>
                <li class="dropdown">
                    <a href="#">S'inscrire</a>
                    <div class="dropdown-content">
                        <a href="?page=registerUser">Je suis client</a>
                        <a href="?page=registerRestaurant">Je suis restaurateur</a>
                    </div>
                </li>
                <li class="search-bar-nav">
                    <form method="GET" action="index.php?page=search">
                        <input type="text" name="search" placeholder="Rechercher un restaurant..." id="search-input" value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
                    </form>
                </li>
                <li>
                    <button id="dark-mode-toggle">☀️</button>
                </li>
            </ul>
        </nav>
    </header>


    <!-- Contenu principal -->
    <main>
        <?= $content ?? '<p>Contenu introuvable. Veuillez sélectionner une page valide.</p>' ?>
    </main>

    <!-- Pied de page -->
    <footer>
        <p>&copy; <?= date('Y') ?> ResaR. Tous droits réservés.</p>
    </footer>

    <script src="./scripts/layout.js"></script>
</body>

</html>