<?php ob_start();?>

<div class="titreAdd">
    <h1>CONNEXION</h1>
</div>

<div class="form-container2">
    <form method="POST">
        <div class="formPart1">
            <div class="inputBx">
                <input type="email" name="u_email" placeholder="Email" required>
            </div>
            <div class="inputBx">
                <input type="password" name="u_password" placeholder="Mot de passe" required>
            </div>
            <div class="inputBx">
                <input type="submit" value="Connexion">
            </div>
            <h5>Merci de vous connecter pour accéder au reste des activités de SUPER 7</h5>
        </div>

        <div class="emptyGrid">ou</div>

        <div class="formPart2">
            <a href="add">S'inscrire</a>
        </div>

    </form>
    <?php if (isset($error)) : ?>
        <p class="error"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>

</div>



<?php
$content = ob_get_clean();
require_once __DIR__ . "/template.php";
?>