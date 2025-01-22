<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle) ?></title>
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <!-- En-tête -->
    <header>
        <nav>
            <ul>
                <li><a href="?page=home">Accueil</a></li>
                <li><a href="?page=restaurants">Restaurants</a></li>
                <li class="dropdown">
                    <a href="#">S'inscrire</a>
                    <div class="dropdown-content">
                        <a href="?page=register">Je suis client</a>
                        <a href="?page=restaurant_registration">Je suis restaurateur</a> <!-- Option pour restaurants -->
                    </div>
                </li>
                <li><a href="?page=login">Connexion</a></li>
                <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                    <li><a href="?page=admin_restaurant">Admin</a></li>
                <?php endif; ?>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="logout.php">Déconnexion</a></li>
                <?php endif; ?>
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
</body>

</html>