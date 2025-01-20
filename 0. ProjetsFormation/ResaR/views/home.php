<?php
$pageTitle = "Accueil - ResaR";
ob_start();
?>

<h2>Découvrir des restaurants</h2>
<h2>HELLO</h2>
<p>Bienvenue sur notre réseau social pour les amateurs de bonne cuisine. Découvrez des restaurants, réservez une table, et explorez leurs menus !</p>

<?php
$content = ob_get_clean();
require "./template.php";
?>