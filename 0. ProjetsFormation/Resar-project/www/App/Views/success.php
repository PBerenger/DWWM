<?php ob_start();?>

<h2>Opération exécutée avec succés</h2>


<?php
$content = ob_get_clean();
$pageTitle = "Inscription utilisateur / administrateur - ResaR";
// $wrapperName = "wrapperAccueil";
require "layout.php";