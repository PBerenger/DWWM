<?php ob_start(); ?>

<link rel="stylesheet" href="assets/css/restaurants.css">

<h2>Restaurants</h2>

<div class="restaurants-container">
    <?php if (!empty($restaurants)): ?>
        <?php foreach ($restaurants as $restaurant): ?>
            <div class="restaurant-card">
                <h3><?= htmlspecialchars($restaurant->getName()); ?></h3>

                <?php
                if (!empty($userProfilePhoto) && file_exists('assets/img/' . $userProfilePhoto)) {
                    $photoPath = 'assets/img/' . htmlspecialchars($userProfilePhoto);
                } else {
                    $photoPath = 'assets/img/u_default.jpg';
                }
                ?>
                <img src="<?= htmlspecialchars($photoPath) ?>"
                     alt="Photo de profil"
                     class="restaurant-photo">

                <p><strong>Localisation :</strong> <?= htmlspecialchars($restaurant->getLocation()); ?></p>
                <p><strong>Téléphone :</strong> <?= htmlspecialchars($restaurant->getPhone()); ?></p>

                <a href="index.php?page=restaurant-details&id=<?= urlencode($restaurant->getId()); ?>" class="btn-more-info">En savoir plus</a>
                <a href="restaurant-resa.php?id=<?= urlencode($restaurant->getId()); ?>" class="btn-more-resa">Réserver</a>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Aucun restaurant disponible.</p>
    <?php endif; ?>
</div>


<?php
$content = ob_get_clean();
$pageTitle = "Liste des Restaurants - ResaR";
require "../App/Views/layout.php";

