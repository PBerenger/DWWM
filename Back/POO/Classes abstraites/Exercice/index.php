<?php

require "Lapin.class.php";
require "Chasseur.class.php";
require "iAnimal.class.php";
require "iHumain.class.php";

$lapin = new Lapin("blanc", 4);
$chasseur = new Chasseur("Paul");

// // Le lapin se nourrit
// $lapin->seNourrir();

while ($lapin->estEnVie()) {
    // Le chasseur se déplace
    $chasseur->seDeplacer();

    // Le lapin crie
    $lapin->crier();

    // Le chasseur chasse le lapin
    $chasseur->chasser($lapin);

    // Si le lapin est encore en vie, il fuit
    if ($lapin->estEnVie()) {
        $lapin->seDeplacer();
    }
}



?>