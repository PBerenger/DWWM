<?php

ob_start();
?>

<p>Bonjour et bienvenue sur mon site internet.</p>

<?php
$content = ob_get_clean();
$title = "Accueil";
$h1 = "Bienvenue";
require "template.php";