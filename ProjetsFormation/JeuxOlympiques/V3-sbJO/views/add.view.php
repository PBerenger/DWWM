<?php
ob_start();
?>


<div class="form-container">
    <form method="POST" action="add" enctype="multipart/form-data">
        <label for="nom">Nom:</label>
        <input type="text" name="nom" required><br>

        <label for="prenom">Prénom:</label>
        <input type="text" name="prenom" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="dateNaissance">Date de naissance:</label>
        <input type="date" name="dateNaissance" required><br>

        <label for="genre">Genre :</label>
        <select id="genre" name="genre">
            <option value="masculin">Masculin</option>
            <option value="féminin">Féminin</option>
            <option value="autre">Autre</option>
        </select>

        <label for="telephone">Téléphone:</label>
        <input type="text" name="telephone" required><br>

        <label for="password">Mot de passe:</label>
        <input type="password" name="password" required><br>

        <label for="confirm_password">Confirmer le mot de passe:</label>
        <input type="password" name="confirm_password" required><br>

        <label for="role">Rôle:</label>
        <select name="role" required>
            <option value='admin'>Admin</option>
            <option value='non-admin'>Non-Admin</option>
        </select><br>

        <label for="image">Image de profil :</label>
        <input class="parcourir" type="file" name="image" /><br>

        <input type="submit" value="Ajouter">
    </form>

    <p><?php echo $message ?? ''; ?></p>
</div>

<?php
$content = ob_get_clean();
$titre = "Ajouter un utilisateur";
require "template.php";
?>