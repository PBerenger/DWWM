<?php
// Définir un titre par défaut pour la page si aucune variable n'est définie
$pageTitle = $pageTitle ?? 'Bienvenue sur ResaR';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle) ?></title>
    <link rel="stylesheet" href="../Public/css/generalStyle.css">
    <link rel="stylesheet" href="../Public/css/template.css">
</head>

<body>
    <!-- En-tête -->
    <header>
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
