<?php
// Inclure les classes nécessaires
require_once '../App/Models/Restaurant.php'; // Si nécessaire

// Vérifier si l'ID du restaurant est passé via l'URL
$restaurantId = isset($_GET['id']) ? (int) $_GET['id'] : null;

if ($restaurantId) {
    // Créer une instance du restaurant et récupérer ses informations
    $restaurant = new \App\Models\Restaurant();
    try {
        $restaurant->setRestaurantInfoById($restaurantId); // Récupérer les données du restaurant
    } catch (Exception $e) {
        echo "Erreur : " . $e->getMessage();
        exit;
    }
} else {
    echo "ID du restaurant non spécifié.";
    exit;
}

?>

<h2><?= htmlspecialchars($restaurant->getName()); ?></h2>
<img src="<?= file_exists('path/to/photos/' . htmlspecialchars($restaurant->getPhoto())) ? htmlspecialchars($restaurant->getPhoto()) : 'default.jpg'; ?>" alt="Photo du restaurant <?= htmlspecialchars($restaurant->getName()); ?>" class="restaurant-photo">
<p><strong>Description :</strong> <?= htmlspecialchars($restaurant->getDescription()); ?></p>
<p><strong>Adresse :</strong> <?= htmlspecialchars($restaurant->getAddress()); ?></p>
<p><strong>Téléphone :</strong> <?= htmlspecialchars($restaurant->getPhone()); ?></p>
<p><strong>Localisation :</strong> <?= htmlspecialchars($restaurant->getLocation()); ?></p>
<p><strong>Date de création :</strong> <?= htmlspecialchars($restaurant->getCreatedAt()); ?></p>

<a href="menu.php?id=<?= $restaurant->getId(); ?>" class="btn-view-menu">Voir le menu</a>
<a href="reservation_form.php?id=<?= $restaurant->getId(); ?>" class="btn-reserve">Réserver une table</a>
