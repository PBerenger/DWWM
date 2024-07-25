<?php ob_start(); ?>

<h1>CLASSEMENT</h1>





<?php
$content = ob_get_clean();
$titre = "Voir les utilisateurs";
require "template.php";