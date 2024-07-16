<?php ob_start(); ?>

<div class="form-container">
    <form method="POST" action="" enctype="multipart/form-data">
        <label for="nom">Nom:</label>
        <input type="text" name="nom" required><br>

        <label for="prenom">Prénom:</label>
        <input type="text" name="prenom" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="telephone">Téléphone:</label>
        <input type="text" name="telephone" required><br>

        <label for="password">Mot de passe:</label>
        <input type="password" name="password" required><br>

        <label for="role">Rôle:</label>
        <select name="role" required>
            <option value="admin">Admin</option>
            <option value="non-admin">Non-Admin</option>
        </select><br>

        <label for="image">Image de profil :</label>
        <input class="parcourir" type="file" name="image" /><br>

        <input type="submit" value="Ajouter">
    </form>

    <p><?php echo $message; ?></p>
</div>

<?php
$content = ob_get_clean();
$titre = "Ajouter un utilisateur";
require "template.php";
?>