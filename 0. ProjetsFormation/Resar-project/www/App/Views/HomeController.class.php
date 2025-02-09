<?php ob_start(); ?>

<h2>Découvrir des restaurants</h2>
<p>Bienvenue sur notre réseau social pour les amateurs de bonne cuisine. Découvrez des restaurants, réservez une table, et explorez leurs menus !</p>

<div class="restaurants">
    <?php if (!empty($restaurants)): ?>
        <?php foreach ($restaurants as $restaurant): ?>
            <div class="restaurant-card-home">

                <?php
                if (!empty($userProfilePhoto) && file_exists('assets/img/' . $userProfilePhoto)) {
                    $photoPath = 'assets/img/' . htmlspecialchars($userProfilePhoto);
                } else {
                    $photoPath = 'assets/img/u_default.jpg';
                }
                ?>
                <img src="<?= htmlspecialchars($photoPath) ?>"
                    alt="Photo de profil"
                    class="restaurant-photo-home">

                <h3><?= htmlspecialchars($restaurant->getName()); ?></h3>
                <p><?= htmlspecialchars($restaurant->getDescription()); ?></p>
                <p><strong>Adresse :</strong> <?= htmlspecialchars($restaurant->getAddress()); ?></p>
                <p><strong>Téléphone :</strong> <?= htmlspecialchars($restaurant->getPhone()); ?></p>
                <a href="restaurant_details.php?id=<?= htmlspecialchars($restaurant->getId()); ?>" class="btn-more-info">Voir plus</a>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Aucun restaurant trouvé.</p>
    <?php endif; ?>
</div>


<?php
$content = ob_get_clean();
$pageTitle = "Accueil - ResaR";
require "layout.php";
