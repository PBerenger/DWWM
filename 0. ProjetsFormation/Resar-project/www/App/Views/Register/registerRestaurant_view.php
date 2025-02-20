<?php ob_start(); ?>
<main>
    <div class="rrestaurant-top">
        <div class="rrestaurant-présentation">
            <h2>Inscrivez votre restaurant sur</h2>
            <h1>ResaR</h1>
            <p>Augmentez vos revenus, dotez-vous d’une meilleure visibilité et fidélisez vos clients en rejoignant nos 55 000 restaurants partenaires déjà réservables sur ResaR, la première plateforme de recherche et de réservation de restaurants en Europe. Testez ResaR Manager, notre logiciel de réservation et de gestion de tables. Visibilité et inscription gratuite. Facturation à l'utilisation : les commissions sont basées sur le nombre de couverts réservés et honorés.</p>
        </div>

        <div class="rrestaurant-form1">
            <h3>Commencez par la base</h3>

            <form action="" method="POST">
                <input type="text" name="prenom" placeholder="Prénom" value="Res" required>
                <input type="text" name="nom" placeholder="Nom" value="Tau" required>
                <input type="email" name="email" placeholder="Email" value="res.tau@gmail.com" required>
                <input type="tel" name="telephone" pattern="[0-9]{10}" maxlength="10" placeholder="Votre téléphone" required>

                <button type="submit" name="suivant">Suivant</button>
            </form>
        </div>

        <div class="rrestaurant-form2">
            <h3>Plus qu'une étape</h3>

            <form method="POST" action="?page=Register-restaurant">
                <input type="password" name="password" placeholder="Votre mot de passe" value="Password@456" required>
                <input type="password" name="passwordRepeat" placeholder="Confirmation du mot de passe" value="Password@456" required>

                <label for="photoProfil">Téléchargez une photo de profil (taille minimum : 150 x 150 pixels)</label>
                <input type="file" name="photoProfil" accept="image/*" required>
                <label for="photoRestaurant">Téléchargez une banière pour votre restaurant (taille minimum : 2048 x 1200 pixels)</label>
                <input type="file" name="photoRestaurant" accept="image/*" required>

                <button type="submit" name="terminer">Terminer</button>
            </form>
        </div>
    </div>

    <div class="rrestaurant-mid">
        <h2>Pourquoi s'inscrire sur ResaR ?</h2>

        <div class="reason1">
            <h3>Obtenez plus de visibilité en ligne</h3>
            <p>
                TheFork Manager est la première plateforme de recherche et de réservation de restaurants, disponible dans 11 pays ! Vous pouvez dès maintenant vous doter gratuitement d’une page personnalisée affichable sur tous les appareils.
            </p>
        </div>

        <div class="reason2">
            <h3>Augmentez votre taux d'occupation</h3>
            <p>
                Un modèle de gestion gagnant-gagnant sans aucun risque pour votre restaurant. Proposez des offres spéciales ou participez au programme de fidélité YUMS et aux festivals pour augmenter vos réservations aux horaires ou saisons creuses.
            </p>
        </div>

        <div class="reason3">
            <h3>Luttez contre les no-shows</h3>
            <p>
                Réduisez le nombre des no-shows à l’aide des outils de TheFork tels que les emails de confirmation automatiques et les SMS, le score de fiabilité des clients et la prise d’empreinte de carte de crédit.
            </p>
        </div>

        <div class="reason4">
            <h3>Faites appel aux experts du secteure</h3>
            <p>
                Les équipes de TheFork accompagnent les restaurateurs depuis plus de 15 ans afin de les aider à développer leur activité et à les soutenir dans leur travail au quotidien.
            </p>
        </div>

    </div>

    <div class="rrestaurant-bot">
        <!-- ??? -->
    </div>
</main>



<?php
$content = ob_get_clean();
$pageTitle = "Inscription restaurateur - ResaR";
require __DIR__ .  "/../layout.php";
