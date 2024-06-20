<?php

require "stagiaire.class.php";

// Stagiaires
$stagiaire1 = new stagiaire("Vigot", [8.0, 9.5, 16.9, 12.2]);
$stagiaire2 = new stagiaire("Bigot", [12.6, 3.5, 6.0, 19.0]);
$stagiaire3 = new stagiaire("Tricot", [18.7, 6.0, 3.0, 7.5]);
$stagiaire4 = new stagiaire("Claude", [3.0, 5.5, 10.0, 11.3]);

$liste = [$stagiaire1, $stagiaire2, $stagiaire3, $stagiaire4];

foreach ($liste as $index => $stagiaire) {
    echo "Stagiaire " . ($index + 1) . " :<br>";
    echo "Nom : " . $stagiaire->getNom() . "<br>";
    echo "Notes : <br>";
    foreach ($stagiaire->getNotes() as $note) {
        echo $note . "<br>";
    }
    echo "<br>";
}

