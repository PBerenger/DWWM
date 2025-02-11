<?php
require_once __DIR__ . '/../../Config/config.php';
ob_start(); ?>

<div class="home-container">
    <div class="home-top">
        <h2>Découvrir des restaurants</h2>
        <p>Bienvenue sur notre réseau social pour les amateurs de bonne cuisine. Découvrez des restaurants, réservez une table, et explorez leurs menus !</p>
    </div>

    <div class="search-bar">
        <form method="GET" action="index.php?page=search">
            <input type="text" name="search" placeholder="Rechercher un restaurant..." id="search-input" value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
        </form>
    </div>


    <div class="home-mid1">
        <div class="home-restaurants-slider">
            <div class="slider-container">
                <?php if (!empty($restaurants)): ?>
                    <?php foreach ($restaurants as $restaurant) : ?>
                        <div class="home-restaurant-slide" data-restaurant-id="<?= urlencode($restaurant->getId()); ?>">
                            <h3><?= htmlspecialchars($restaurant->getName()); ?></h3>

                            <?php
                            if (!empty($userProfilePhoto) && file_exists('assets/img/' . $userProfilePhoto)) {
                                $photoPath = 'assets/img/' . htmlspecialchars($userProfilePhoto);
                            } else {
                                $photoPath = 'assets/img/r_default.jpg';
                            }
                            ?>
                            <img src="<?= htmlspecialchars($photoPath) ?>"
                                alt="Photo du restaurant"
                                class="restaurant-photo">

                            <div class="reestaurant-info">
                                <p><strong>Localisation :</strong> <?= htmlspecialchars($restaurant->getLocation()); ?></p>
                                <p><strong>Téléphone :</strong> <?= htmlspecialchars($restaurant->getPhone()); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Aucun restaurant disponible.</p>
                <?php endif; ?>
            </div>

            <!-- Contrôles du slider -->
            <button class="slider-prev">←</button>
            <button class="slider-next">→</button>
        </div>
    </div>

    <div class="home-img-background"></div>

    <div class="home-mid2">
        <h2>Inscrivez-vous</h2>
        <p>Créez un compte pour réserver une table, laisser des avis, et partager vos expériences culinaires avec la communauté.</p>
        <a href="index.php?page=register" class="btn-more-info">S'inscrire</a>

        <h2>Enregistrez votre restaurant</h2>
        <p>Propriétaire d'un restaurant ? Inscrivez-vous pour ajouter votre établissement à notre base de données.</p>
        <a href="index.php?page=restaurant_registration" class="btn-more-info">Enregistrer un restaurant</a>
    </div>

    <div class="home-bot">
        <h2>Vos avis</h2>
        <div class="home-reviews">
            <?php foreach ($reviews as $review) : ?>
                <div class="home-review">
                    <a href="index.php?page=restaurant&id=<?= $review->getRestaurantId() ?>">
                        <img src="<?= $review->getRestaurantPicture() ?>" alt="Photo du restaurant <?= $review->getRestaurantName() ?>">
                        <h3><?= $review->getRestaurantName() ?></h3>
                    </a>
                    <p><?= $review->getContent() ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<script src="./scripts/home.js"></script>

<?php
$content = ob_get_clean();
$pageTitle = "Accueil - ResaR";
require "layout.php";
