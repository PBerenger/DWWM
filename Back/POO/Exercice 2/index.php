<?php

require_once "voiture.class.php";

// Voiture 1
$maVoiture = new voiture("Peugeot", "208", "2020", "rouge", "50");
$maVoiture->accelerer(100);
$maVoiture->afficher();

?>