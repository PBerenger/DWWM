<?php

require_once "Rectangle.class.php";
require_once "TriangleRectangle.class.php";
require_once "Cercle.class.php";
require_once "Pave.class.php";


// affichage Rectangle
echo "||================||\n";
echo "|| Le Rectangle : ||\n";
echo "||================||\n";
$rectangle1 = new Rectangle(10, 5);
$rectangle2 = new Rectangle(10, 10);

$rectangle1->afficherRectangle();
$rectangle2->afficherRectangle();

echo "******************************************************************";
echo "\n\n";

// affichage TriangleRectangle
echo "||=========================||\n";
echo "|| Le Triangle Rectangle : ||\n";
echo "||=========================||\n";
$triangleRectangle = new TriangleRectangle(20, 5);

$triangleRectangle->afficherTriangleRectangle();

echo "******************************************************************";
echo "\n\n";

// afficher Cercle
echo "||=============||\n";
echo "|| Le Cercle : ||\n";
echo "||=============||\n";
$cercle = new Cercle(5);
$cercle->afficherCercle();

echo "******************************************************************";
echo "\n\n";

// afficher Pavé

$pave = new Pave();
$pave->calculerVolumePave($longueur, $largeur, $hauteur);

if (is_numeric($volume)) {
    echo "Le volume du pavé avec une longueur de $longueur, une largeur de $largeur et une hauteur de $hauteur est : $volume";
} else {
    echo $volume; // Affiche un message d'erreur
}
