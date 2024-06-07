<?php
// Vérification saisie (si numérique et il ne doit pas être inférieur ou égal à zero)
function verifieSaisie($value)
{
    if (!is_numeric($value) || $value <= 0) {
        echo "Nombre invalide, recommencez : \n";
        return false;
    }
    return true;
}

// fonction calcul du cercle
function calculeRayon($rayon)
{

    // circonférence - surface
    $circonference = 2 * M_PI * $rayon;
    $surface = M_PI * $rayon * pow($rayon, 2);

    return [
        'circonference' => round($circonference, 2),
        'surface' => round($surface, 2),
    ];
}


//--------------------------------------------------------
// CALCULATRICE

//Fonction pour demander un nombre à l'utilisateur
function verifierSaisie($nombre)
{
    if (!is_numeric($nombre)) {
        return false;
    }
    return true;
}


//fonction pour effectuer l'opération choisie par l'utilisateur

function operation($choix, $nombre1, $nombre2)
{
    $resultat = "";

    switch ($choix) {
        case "addition":
            $resultat = $nombre1 + $nombre2;
            return "Le resultat de l'addition est : $resultat";
        case "soustraction":
            $resultat = $nombre1 - $nombre2;
            return "Le resultat de la soustraction est : $resultat";
        case "multiplication":
            $resultat = $nombre1 * $nombre2;
            return "Le resultat de la multiplication est : $resultat";
        case "division":
            if ($nombre2 != 0) {
            $resultat = $nombre1 / $nombre2;
            return "Le resultat de la division est : $resultat";
            } else {
                return "Erreur";
            }
            default:
            return "Choix invalide.";
    }
}
