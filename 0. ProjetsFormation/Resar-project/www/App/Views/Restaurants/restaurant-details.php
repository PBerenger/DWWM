<?php ob_start(); ?>

<link rel="stylesheet" href="assets/css/restaurant-details.css">

<h2><?= htmlspecialchars($restaurant->getName()); ?></h2>

<div class="restaurants-details-container">

    <?php
    $photoPath = !empty($restaurant->getPhoto()) && file_exists('assets/img/' . $restaurant->getPhoto())
        ? 'assets/img/' . htmlspecialchars($restaurant->getPhoto())
        : 'assets/img/r_default.jpg';
    ?>
    <img src="<?= htmlspecialchars($photoPath) ?>"
        alt="Photo du restaurant"
        class="restaurant-photo-cover">

    <div class="restaurant-infos">
        <p>Localisation : <?= htmlspecialchars($restaurant->getLocation()); ?></p>
        <p>Téléphone : <?= htmlspecialchars($restaurant->getPhone()); ?></p>
        <p>Adresse : <?= htmlspecialchars($restaurant->getAddress()); ?></p>
        <p>Description : <?= htmlspecialchars($restaurant->getDescription()); ?></p>
        <p>Date de création : <?= htmlspecialchars($restaurant->getCreatedAt()); ?></p>
        <p>Propriétaire : <?= htmlspecialchars($restaurant->getOwner()); ?></p>

        <a href="menu.php?id=<?= urlencode($restaurant->getId()); ?>" class="btn-view-menu">Voir le menu</a>
        <a href="restaurant_resa.php?id=<?= urlencode($restaurant->getId()); ?>" class="btn-more-resa">Réserver</a>
    </div>
</div>

<?php
$content = ob_get_clean();
$pageTitle = "Détails du Restaurant - ResaR";
require "../App/Views/layout.php";
?>