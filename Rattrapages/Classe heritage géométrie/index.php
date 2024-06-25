<?php

require_once "Rectangle.class.php";
require_once "TriangleRectangle.class.php";
require_once "Cercle.class.php";
require_once "Pave.class.php";
require_once "Pyramide.class.php";
require_once "Sphere.class.php";


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
echo "||===========||\n";
echo "|| Le Pavé : ||\n";
echo "||===========||\n";

$pave = new Pave(10, 5, 3);
$volume = $pave->calculerVolumePave();
$perimetre = $pave->perimetreRectangle();

if (is_numeric($volume)) {
    echo "Le périmètre du pavé est de $perimetre et le volume est : $volume. \n";
} else {
    echo $volume . "\n"; // Affiche un message d'erreur
}

echo "******************************************************************";
echo "\n\n";


// afficher Pyramide
echo "||===============||\n";
echo "|| La Pyramide : ||\n";
echo "||===============||\n";

$pyramide = new Pyramide(10);
$volume = $pyramide->calculerVolumePyramide();
echo "Le volume de la pyramide est : " . $volume . ".\n";

echo "******************************************************************";
echo "\n\n";


// afficher sphère
echo "||=============||\n";
echo "|| La Sphère : ||\n";
echo "||=============||\n";

$sphere = new Sphere(5);
$volume = $sphere->calculerVolumeSphere();
$rayon = $sphere->getRayonC();
echo "Le volume de la sphère, avec un rayon de $rayon, est $volume.";

echo "******************************************************************";
echo "\n\n";

?>