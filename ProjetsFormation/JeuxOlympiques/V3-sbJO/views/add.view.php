<?php
ob_start();
?>



<div class="form-container">
    <form method="POST" action="add" enctype="multipart/form-data">
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

        <select id="genre" name="genre" required>
            <option class="disabled" value="" disabled selected>Genre</option>
            <option value="masculin">Masculin</option>
            <option value="féminin">Féminin</option>
            <option value="autre">Autre</option>
        </select>

        <div class="inputBx">
            <input type="text" name="telephone" placeholder="telephone" required>
        </div>
        <div class="inputBx">
            <input type="password" name="password" placeholder="Mot de passe" required>
        </div>
        <div class="inputBx">
            <input type="password" name="confirm_password" placeholder="Confirmer le mot de passe" required>
        </div>

        <select name="role" required>
            <option class="disabled" value="" disabled selected>Rôle</option>
            <option value='admin'>Admin</option>
            <option value='non-admin'>Non-Admin</option>
        </select><br>

        <div class="inputBx">
            <input class="parcourir" type="file" name="image" /><br>
        </div>

        <div class="inputBx">
            <input type="submit" value="Connexion">
        </div>
    </form>

    <p><?php echo $message ?? ''; ?></p>
</div>

<?php
$content = ob_get_clean();
$titre = "Ajouter un utilisateur";
require "template.php";
?>