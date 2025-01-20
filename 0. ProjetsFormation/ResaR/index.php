<?php
session_start();
require_once './mains/router.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réseau des Restaurants</title>
    <link rel="stylesheet" href="style.css"> <!-- Lien vers votre CSS -->
</head>
<body>
    <header>
        <h1>Bienvenue sur le réseau des restaurants</h1>
        <nav>
            <ul>
                <li><a href="?page=home">Accueil</a></li>
                <li><a href="?page=register">S'inscrire</a></li>
                <li><a href="?page=login">Se connecter</a></li>
                <li><a href="?page=restaurants">Restaurants</a></li>
                <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                    <li><a href="?page=admin_restaurant">Admin</a></li>
                <?php endif; ?>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="logout.php">Déconnexion</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
    <main>
        <?php
        require './mains/router.php';
        ?>
    </main>
    <footer>
        <p>&copy; 2025 Réseau des Restaurants</p>
    </footer>
</body>
</html>

<?php
$content = ob_get_clean();
// require_once __DIR__ . "/template.php";
?>