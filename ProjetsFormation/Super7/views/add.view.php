<?php
ob_start();
$authManager = new AuthManager();
$authManager->startSession();
$userController = new UserController();
?>

<?php if (isset($_SESSION['user_id'])) : ?>
    <?php if ($userController->isAdmin()) : ?>
        <div class="readButtons">
            <a class="validButton" href="<?= URL ?>read">RETOUR</a>
            <a class="validButton" href="<?= URL ?>delete">Supprimer un utilisateur</a>
        </div>
        <h2 class="titrePage">Ajouter un utilisateur</h2>
    <?php endif; ?>
<?php endif; ?>


<div class="form-container">
    <form method="POST" action="<?= URL ?>add" enctype="multipart/form-data">
        <div class="inputBx">
            <input type="text" name="nom" placeholder="nom" required>
        </div>
        <div class="inputBx">
            <input type="text" name="prenom" placeholder="prenom" required>
        </div>
        <div class="inputBx">
            <input type="email" name="email" placeholder="Email" required>
        </div>
        <div class="inputBx">
            <input type="date" name="dateNaissance" required>
        </div>


        <select id="genre" name="genre">
            <option class="disabled" value="" disabled selected>Genre</option>
            <option value="masculin">Masculin</option>
            <option value="féminin">Féminin</option>
            <option value="nonDefinit">Non définit</option>
        </select>


        <div class="inputBx">
            <input type="text" name="telephone" placeholder="telephone">
        </div>


        <div class="inputBx">
            <input type="password" id="passwordSaisie" oninput="verifPassword()" name="password" placeholder="Mot de passe" required>
            <button type="button" id="togglePassword">
                <img class="eyePSW" src="../public/img/eyesNotSee.png" alt="Afficher le mot de passe">
            </button>
        </div>

        <div id="mdpContainer" class="mdpContainer">
            <h4>Doit comporter au minimum:</h4>
            <p id="longueurMDP" class="invalid">8 caractères</p>
            <p id="majuscule" class="invalid">1 majuscule</p>
            <p id="minuscule" class="invalid">1 minuscule</p>
            <p id="nombre" class="invalid">1 chiffre</p>
            <p id="specialChar" class="invalid">1 caractère spécial</p>
        </div>


        <div class="inputBx">
            <input type="password" name="confirm_password" placeholder="Confirmer le mot de passe" required>
        </div>


        <?php if (isset($_SESSION['user_id'])) : ?>
            <?php if ($userController->isAdmin()) : ?>
                <select name="role" required>
                    <option class="disabled" value="" disabled selected>Rôle</option>
                    <option value='admin'>Admin</option>
                    <option value='non-admin'>Non-Admin</option>
                </select><br>
            <?php endif; ?>
        <?php endif; ?>


        <div class="inputBx">
            <label for="file-upload" class="parcourir">Téléchargez une image de profil</label>
            <input id="file-upload" type="file" name="image" /><br>
        </div>


        <div class="inputBx">
            <input type="submit" value="Ajouter" onclick="return validateForm();">
        </div>
    </form>
</div>

<?php
$content = ob_get_clean();
$titre = "Ajouter un utilisateur";
require "template.php";
?>