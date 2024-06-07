<?php
require "fonction.php";
$resultat = "";

if (isset($_GET["nombre1"], $_GET["nombre2"], $_GET["calculateur"])) {
    $nombre1 = $_GET['nombre1'];
    $nombre2 = $_GET['nombre2'];
    $choix = $_GET['calculateur'];

    if (verifierSaisie($nombre1) && verifieSaisie($nombre2)) {
        $resultat = operation($choix, $nombre1, $nombre2);
    } else {
        $resultat = "Nombre choisi invalide.";
    }
}

ob_start();
if (isset($resultat)) {
    echo $resultat;
}

$content = ob_get_clean();
$titre = "resultat opération";
require "template.php";
