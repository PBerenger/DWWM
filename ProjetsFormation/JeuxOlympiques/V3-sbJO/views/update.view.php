<?php
ob_start();
?>

<div class="form-container">
    <?php if ($utilisateur) : ?>
        <form method="POST" enctype="multipart/form-data" action="<?= URL ?>update">
            <input type="hidden" name="id_user" value="<?php echo htmlspecialchars($utilisateur['id_user']); ?>">
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
                <input type="text" name="telephone" value="<?php echo htmlspecialchars($utilisateur['userPhone'] ?? 'Numéro de téléphone'); ?>" required><br>
            </div>

            <div class="inputBx">
                <input type="date" name="dateNaissance" required>
            </div>

            <div class="inputBx">
                <input type="password" name="password" placeholder="Nouveau mot de passe" required>
            </div>
            <div class="inputBx">
                <input type="password" name="confirm_password" placeholder="Confirmer le nouveaumot de passe" required>
            </div>

            <select id="genre" name="genre" required>
                <option class="disabled" value="" disabled selected>Genre</option>
                <option value="masculin">Masculin</option>
                <option value="féminin">Féminin</option>
                <option value="autre">Autre</option>
            </select>

            <select name="role" required>
                <option class="disabled" value="" disabled selected>Rôle</option>
                <option value='admin'>Admin</option>
                <option value='non-admin'>Non-Admin</option>
            </select><br>

            <div class="inputBx">
                <label for="file-upload" class="parcourir">Image de profil</label>
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
