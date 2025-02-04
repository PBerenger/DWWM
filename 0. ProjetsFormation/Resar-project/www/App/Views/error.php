<?php ob_start(); ?>

<main>
    <h1>ResaR</h1>
    <p>Une erreur est survenue : <?= $errorMessage ?></p>
</main>

<?php
$content = ob_get_clean();
$title = "Page d'erreur";
// $wrapperName = "wrapperErrors";
require "layout.php";
?>