<?php
ob_start();
$authManager = new AuthManager();
$authManager->startSession();
$userController = new UserController();
?>

<h2 class="titrePage">Modifier les informations</h2>

<div class="form-container">
    <?php if ($utilisateur) : ?>
        <form method="POST" enctype="multipart/form-data" action="<?= URL ?>update">
            <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($utilisateur['user_id']); ?>">
            <input type="hidden" name="currentImage" value="<?php echo htmlspecialchars($utilisateur['image_name'] ?? 'default.jpg'); ?>">
            <div class="inputBx">
                <input type="text" name="nom" value="<?php echo htmlspecialchars($utilisateur['userLastName'] ?? 'Entrez votre nom'); ?>" required><br>
            </div>
            <div class="inputBx">
                <input type="text" name="prenom" value="<?php echo htmlspecialchars($utilisateur['userFirstName'] ?? 'Entrez votre Prénom'); ?>" required><br>
            </div>
            <div class="inputBx">
                <input type="email" name="email" value="<?php echo htmlspecialchars($utilisateur['userEmail'] ?? 'Entrez votre Mail'); ?>" required><br>
            </div>
            <div class="inputBx">
                <input type="text" name="telephone" value="<?php echo htmlspecialchars($utilisateur['userPhone'] ?? 'Votre numéro de téléphone'); ?>" required><br>
            </div>

            <div class="inputBx">
                <input type="date" name="dateNaissance" value="<?php echo htmlspecialchars($utilisateur['userDateBirth'] ?? ''); ?>"required>
            </div>


            <div class="inputBx">
                <input type="password" id="passwordSaisie" oninput="verifPassword()" name="password" placeholder="Mot de passe">
                <button type="button" id="togglePassword">
                    <img class="eyePSW" src="../public/images/all/eyesOpen.png" alt="Afficher le mot de passe">
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
                <input type="password" name="confirm_password" placeholder="Confirmer le nouveaumot de passe">
            </div>

            <select id="genre" name="genre" required>
                <option class="disabled" value="" disabled selected>Genre</option>
                <option value="masculin">Masculin</option>
                <option value="féminin">Féminin</option>
                <option value="autre">Autre</option>
            </select>


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
                <label for="file-upload" class="parcourir">Télécharger une image de profil</label>
                <input id="file-upload" type="file" name="image" /><br>
            </div>

            <div class="inputBx">
                <input type="submit" value="Mettre à jour">
            </div>
        </form>
    <?php else : ?>
        <p>Utilisateur non trouvé.</p>
    <?php endif; ?>
</div>

<?php
$content = ob_get_clean();
$titre = "Modifier un utilisateur";
require "template.php";
