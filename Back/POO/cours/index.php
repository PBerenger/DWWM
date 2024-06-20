<?php

require_once "plante.class.php";

// variable instancée par "new"
$chene = new plante("Le chêne", "arbre", "20 mètres", "100 ans", "Fagacées");
$rose = new plante ("la rose", "fleur", "1 mètre", "2 ans", "Rosacées");
$tournesol = new plante ("Le tournesol", "fleur", "3 mètres", "1 an", "Astéracées");

$chene -> affichage();
$rose -> affichage();
$tournesol -> affichage();

// appel pour la modification
$chene->setHauteur("50 mètres");
// second affichage
$chene -> affichage();

?>