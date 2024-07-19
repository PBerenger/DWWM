<?php
ob_start();
?>

<div class="form-container">
    <form method="POST" action="<?= URL ?>delete">
        <label>Utilisateurs:</label>
        <?php foreach ($users as $user) : ?>
            <div>
                <input type="checkbox" name="ids[]" value="<?php echo htmlspecialchars($user['id_user']); ?>">
                <?php echo htmlspecialchars($user['userFirstName'] . ' ' . $user['userLastName']); ?>
            </div>
        <?php endforeach; ?>
        <input type="submit" value="Supprimer" onclick="return confirm('Voulez-vous vraiment supprimer les utilisateurs sélectionnés ?');">
    </form>
</div>

<?php
$content = ob_get_clean();
$titre = "Supprimer des utilisateurs";
require "template.php";
