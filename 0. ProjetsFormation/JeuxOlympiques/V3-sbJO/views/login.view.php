<?php ob_start(); ?>

<div class="form-container">
    <h1>Connexion</h1>
    <form method="POST">
        <div class="inputBx">
            <input type="email" name="email" placeholder="Email" required>
        </div>
        <div class="inputBx">
            <input type="password" name="password" placeholder="Mot de passe" required>
        </div>
        <div class="inputBx">
            <input type="submit" value="Connexion">
        </div>
    </form>
    <?php if (isset($error)) : ?>
        <p class="error"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>
</div>


<?php
$content = ob_get_clean();
require "template.php";
?>
