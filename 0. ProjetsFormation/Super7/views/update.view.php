<?php
ob_start();
$authManager = new AuthManager();
$authManager->startSession();
$userController = new UserController();

if (!isset($utilisateur)) {
    echo "<p>Utilisateur non trouvé.</p>";
    return;
}
?>

<h2 class="titreUpdate">Modifier les informations</h2>

<div class="form-container-update">
    <form id="updateForm" method="POST" enctype="multipart/form-data" action="<?= URL ?>update">
        <input type="hidden" name="id_user" value="<?= htmlspecialchars($utilisateur['id_user']); ?>">
        <input type="hidden" name="currentImage" value="<?= htmlspecialchars($utilisateur['image_name'] ?? 'default.jpg'); ?>">
        <input type="hidden" name="currentPassword" value="<?= htmlspecialchars($utilisateur['u_password'] ?? ''); ?>">

        <div class="infosContainer">
            <div class="updateLeftBow">
                <h4 class="titreInfosP">Informations personnelles</h4>
                <div class="inputBx">
                    <input type="text" name="nom" placeholder="Entrez votre nom" value="<?= htmlspecialchars($utilisateur['u_lname'] ?? ''); ?>">
                </div>
                <div class="inputBx">
                    <input type="text" name="prenom" placeholder="Entrez votre prénom" value="<?= htmlspecialchars($utilisateur['u_fname'] ?? ''); ?>">
                </div>
                <div class="inputBx">
                    <input type="email" name="email" placeholder="Entrez votre mail" value="<?= htmlspecialchars($utilisateur['u_email'] ?? ''); ?>">
                </div>
                <div class="inputBx">
                    <input type="text" name="telephone" placeholder="Votre numéro de téléphone" value="<?= htmlspecialchars($utilisateur['u_phone'] ?? ''); ?>">
                </div>
                <div class="inputBx">
                    <input type="date" name="dateNaissance" value="<?= htmlspecialchars($utilisateur['birthDay'] ?? ''); ?>" required>
                </div>
                <select id="genre" name="genre" required>
                    <option value="" disabled selected hidden>Genre</option>
                    <option value="masculin">Masculin</option>
                    <option value="féminin">Féminin</option>
                </select>
            </div>

            <div class="updateRightBox">
                <h4 class="titreInfosP">Informations de sécurité</h4>
                <div class="inputBx password-container">
                    <input type="password" id="passwordSaisie" oninput="verifPassword()" name="password" placeholder="Mot de passe">
                    <button type="button" id="togglePassword">
                        <img class="eyePSW" src="../public/img/eyesNotSee.png" alt="Afficher le mot de passe">
                    </button>
                </div>

                <div class="inputBx">
                    <input type="password" name="confirm_password" placeholder="Confirmez le mot de passe">
                </div>

                <?php if ($userController->isAdmin()) : ?>
                    <select id="role" name="role">
                        <option class="disabled" value="" disabled selected hidden>Rôle</option>
                        <option value='admin'>Admin</option>
                        <option value='non-admin'>Non-Admin</option>
                    </select>
                <?php endif; ?>
            </div>
        </div>

        <div class="endBox">
            <div class="inputBx">
                <label for="file-upload" class="parcourir">Modifier l'image de profil</label>
                <input id="file-upload" type="file" name="image">
            </div>
            <div class="inputBx">
                <input type="submit" value="Mettre à jour">
            </div>
            <div class="inputBx">
                <a class="updateRetour" href="<?= URL ?>accueil">RETOUR (annuler les modifications)</a>
            </div>
        </div>
    </form>
</div>

<script>
    let isFormModified = false;

    // Surveiller les changements dans le formulaire
    document.getElementById('updateForm').addEventListener('input', () => {
        isFormModified = true;
    });

    // Afficher un avertissement si l'utilisateur tente de quitter la page sans sauvegarder les modifications
    window.addEventListener('beforeunload', (event) => {
        if (isFormModified) {
            event.preventDefault();
            event.returnValue = '';
        }
    });

    // Réinitialiser l'état de modification du formulaire lorsqu'il est soumis
    document.getElementById('updateForm').addEventListener('submit', () => {
        isFormModified = false;
    });
</script>

<?php
$content = ob_get_clean();
require_once __DIR__ . "/template.php";
?>