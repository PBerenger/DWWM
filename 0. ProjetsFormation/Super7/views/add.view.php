<?php
ob_start();
$authManager = new AuthManager();
$authManager->startSession();
$userController = new UserController();
?>

<?php if (isset($_SESSION['id_user'])) : ?>
    <?php if ($userController->isAdmin()) : ?>
        <div class="readButtons">
            <a class="validButton" href="<?= URL ?>read">RETOUR</a>
            <a class="validButton" href="<?= URL ?>delete">Supprimer un utilisateur</a>
        </div>
        <h2 class="titreAddAdmin">AJOUTER UN UTILISATEUR</h2>
    <?php endif; ?>
<?php endif; ?>

<?php if (!$userController->isAdmin()) :?>
    <div class="titreAddNonAdmin">
        <h1>INSCRIPTION</h1>
    </div>
<?php endif; ?>

<div class="form-container">
    <form method="POST" action="<?= URL ?>add" enctype="multipart/form-data">
        <div class="formPart1">
            <div class="inputBx">
                <input type="text" name="nom" placeholder="Nom" required>
            </div>
            <div class="inputBx">
                <input type="text" name="prenom" placeholder="Prenom" required>
            </div>
            <div class="inputBx">
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <?php if ($userController->isAdmin()) : ?>
                <select name="role" required>
                    <option class="disabled" value="" disabled selected>Rôle</option>
                    <option value='admin'>Admin</option>
                    <option value='non-admin'>Non-Admin</option>
                    <option value='admin'>Enseignant</option> <!-- ajouter le numéro '3' dans la base de donnée -->
                </select><br>
            <?php endif; ?>
        </div>

        <div class="formPart2">
            <div class="inputBx">
                <input type="date" name="dateNaissance" required>
            </div>
            
            <select id="genre" name="genre">
                <option class="disabled" value="" disabled selected>Genre</option>
                <option value="masculin">Masculin</option>
                <option value="féminin">Féminin</option>
            </select>

            <div class="inputBx">
                <input type="text" name="telephone" placeholder="Telephone">
            </div>

            <div>
                Le numéro de téléphone n'est pas obligatoire.
            </div>
        </div>
        
        <div class="formPart3">
            <div class="inputBx">
                <input type="password" id="passwordSaisie" oninput="verifPassword()" name="password" placeholder="Mot de passe" required>
                <button type="button" id="togglePassword">
                    <img class="eyePSW" src="../public/img/eyesNotSee.png" alt="Afficher le mot de passe">
                </button>
            </div>

            <div class="inputBx">
                <input type="password" name="confirm_password" placeholder="Confirmer le mot de passe" required>
            </div>

            <div id="mdpContainer" class="mdpContainer">
                <h4>Doit comporter au minimum:</h4>
                <p id="longueurMDP" class="invalid">8 caractères</p>
                <p id="majuscule" class="invalid">1 majuscule</p>
                <p id="minuscule" class="invalid">1 minuscule</p>
                <p id="nombre" class="invalid">1 chiffre</p>
                <p id="specialChar" class="invalid">1 caractère spécial</p>
            </div>
        </div>

        <div class="formPart4">
            <div class="formPart4.haut">
                <label for="file-upload" class="custom-file-upload">
                    Téléchargez une image de profil
                </label>
                <input id="file-upload" type="file" name="image" style="display: none;" />
                <span id="file-name"></span> <!-- Pour afficher le nom du fichier choisi -->
            </div>

            <div class="formPart4.bas" >
                <div class="inputBx">
                    <input type="submit" value="Ajouter">
                </div>
            </div>
        </div>

    </form>
</div>

<?php
$content = ob_get_clean();
require_once __DIR__ . "/template.php";
?>