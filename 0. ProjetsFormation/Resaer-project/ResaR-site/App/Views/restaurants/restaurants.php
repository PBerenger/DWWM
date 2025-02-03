<?php ob_start(); ?>

<h2>Restaurants</h2>

<div class="restaurants-container">
    <?php if (!empty($restaurants)): ?>
        <?php foreach ($restaurants as $restaurant): ?>
            <div class="restaurant-card">
                <h3><?= htmlspecialchars($restaurant->getName()); ?></h3>
                <img src="<?= file_exists('path/to/photos/' . htmlspecialchars($restaurant->getPhoto())) ? htmlspecialchars($restaurant->getPhoto()) : 'default.jpg'; ?>" alt="Photo du restaurant <?= htmlspecialchars($restaurant->getName()); ?>" class="restaurant-photo">
                <p><strong>Localisation :</strong> <?= htmlspecialchars($restaurant->getLocation()); ?></p>
                <p><strong>Téléphone :</strong> <?= htmlspecialchars($restaurant->getPhone()); ?></p>
                
                <a href="restaurant_details.php?id=<?= $restaurant->getId(); ?>" class="btn-more-info">En savoir plus</a>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Aucun restaurant disponible.</p>
    <?php endif; ?>
</div>

<script src="./scripts/restaurants.js"></script>

<?php
$content = ob_get_clean();
$pageTitle = "Liste des Restaurants - ResaR";
require "../App/Views/layout.php";
?>

