<?php ob_start(); ?>

<main>
    <!-- Formulaire HTML -->
    <form action="registerProcess.php" method="POST">
        <h2>Inscription</h2>

        <div class="form-group">
            <label for="firstName">Prénom :</label>
            <input type="text" id="firstName" name="firstName" required>
        </div>

        <div class="form-group">
            <label for="lastName">Nom :</label>
            <input type="text" id="lastName" name="lastName" required>
        </div>

        <div class="form-group">
            <label for="email">Adresse email :</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div class="form-group">
            <label for="passwordRepeat">Répéter le mot de passe :</label>
            <input type="password" id="passwordRepeat" name="passwordRepeat" required>
        </div>

        <button type="submit">S'inscrire</button>
    </form>

</main>

<?php
$content = ob_get_clean();
$pageTitle = "Inscription - ResaR";
// $wrapperName = "wrapperAccueil";
require "layout.php";
?>