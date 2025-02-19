<?php ob_start(); ?>


<main>
    <h2>Inscription d'un restaurant</h2>

    
</main>

<?php
$content = ob_get_clean();
$pageTitle = "Inscription client - ResaR";
require "../App/Views/layout.php";
