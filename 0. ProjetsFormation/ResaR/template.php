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
    <link rel="stylesheet" href="styles.css"> <!-- Lien vers vos styles -->
</head>
<body>
    <!-- En-tête -->
    <header>
        <nav>
            <ul>
                <li><a href="/?page=home">Accueil</a></li>
                <li><a href="/?page=restaurants">Restaurants</a></li>
                <li><a href="/?page=register">S'inscrire</a></li>
                <li><a href="/?page=login">Connexion</a></li>
                <h2>HAHAHA</h2>
            </ul>
        </nav>
    </header>

    <!-- Contenu principal -->
    <main>
        <?php
        // Inclure dynamiquement le contenu de la page
        if (isset($pageContent)) {
            echo $pageContent;
        } else {
            echo '<p>Contenu introuvable. Veuillez sélectionner une page valide.</p>';
        }
        ?>
    </main>

    <!-- Pied de page -->
    <footer>
        <p>&copy; <?= date('Y') ?> ResaR. Tous droits réservés.</p>
    </footer>
</body>
</html>
