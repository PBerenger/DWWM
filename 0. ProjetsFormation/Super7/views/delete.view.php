<?php
ob_start();
?>

<div class="readButtons">
    <a class="validButton" href="<?= URL ?>read">RETOUR</a>
    <a class="validButton" href="<?= URL ?>add">Ajouter un utilisateur</a>
</div>
<h2 class="titrePage">Supprimer un utilisateur</h2>


<div class="form-container">
    <form method="POST" action="<?= URL ?>delete" id="deleteForm">
        <div class="inputBxSupp fixed-button">
            <input type="submit" value="Supprimer les utilisateurs sélectionnés" onclick="return validateForm();">
            <button type="button" class="deselectButton" onclick="deselectAll()">Désélectionner tout</button>
            <!-- <a class="retourArrow" href="<?= URL ?>read"><img src="/public/images/all/retourArrow.png" alt="backArrow"></a> -->
        </div>
        <h2>Sélectionnez un ou plusieurs utilisateurs:</h2>
        <div class="users-grid">
            <?php foreach ($users as $user) : ?>
                <label class="user-checkbox-container" for="<?php echo htmlspecialchars($user['id_user']); ?>">
                    <div class="user-row">
                        <input type="checkbox" id="<?php echo htmlspecialchars($user['id_user']); ?>" name="ids[]" value="<?php echo htmlspecialchars($user['id_user']); ?>">
                        <span><?php echo htmlspecialchars($user['u_fname'] . ' ' . $user['u_lname']); ?></span>
                    </div>
                </label>
            <?php endforeach; ?>
        </div>
    </form>
</div>



<?php
$content = ob_get_clean();
require_once __DIR__ . "/template.php";
