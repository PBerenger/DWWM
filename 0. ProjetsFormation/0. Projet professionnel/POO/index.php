<?php
ob_start();
?>

<p class="paraUn">Bonjour et bienvenue le site MonCommerce.com</p>

<h5>Créez votre catalogue en ligne personnalisé</h5>
<p class="paraDeux">Pensée pour l’industrie des fruits et légumes, notre plateforme digitale offre une expérience de commerce optimale pour vous et vos clients.
Mettez à jour les prix et les disponibilités instantanément. Créez des tarifs personnalisés par client.</p>

<?php
$content = ob_get_clean();
$title = "Accueil";
$h1 = "Bienvenue";
require "template.php";