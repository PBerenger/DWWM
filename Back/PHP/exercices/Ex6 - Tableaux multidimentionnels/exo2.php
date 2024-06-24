<?php
// Faire des triangles

function demanderTailleTriangle()
{
    // Tant que la taille est négative, égale à zéro ou n'est pas un nombre, on demande à l'utilisateur d'entrer une taille valide
    $size = 0;
    while ($size <= 0 || !is_numeric($size)) {
        $size = readline("Veuillez entrer la taille du triangle : ");
    }
    return $size;
}


// ==================================================
// ===             Triangle isocèle               ===
// ==================================================
function afficherTriangleIsocele($char)
{
    $size = demanderTailleTriangle();

    // Génération du triangle
    for ($i = 1; $i <= $size; $i++) {
        $halfSize = ceil($size / 2);
        // Si nous sommes dans la première moitié du triangle, on utilise une boucle for croissante
        // Sinon on utilise une boucle for décroissante
        if ($i <= $halfSize) {
            for ($j = 0; $j < $i; $j++) {
                echo $char;
            }
        } else {
            for ($j = $size - $i + 1; $j > 0; $j--) {
                echo $char;
            }
        }
        // On passe à la ligne pour préparer l'affichage de la prochaine ligne
        echo PHP_EOL;
    }
}

// ==================================================
// ===             Triangle rectangle             ===
// ==================================================
function afficherTriangleRectangle($charBord, $charInterieur)
{
    $size = demanderTailleTriangle();

    // On affiche le triangle ligne par ligne de manière croissante jusqu'à la taille saisie par l'utilisateur
    for ($i = 1; $i <= $size; $i++) {
        // Le nombre de caractère à afficher dans une ligne est égale au numéro de la ligne (i.e. la ligne 15 aura 15 caractères)
        for ($j = 1; $j <= $i; $j++) {
            // Dans chaque ligne,
            // si c'est le premier ou le dernier caractère d'une ligne ou la dernière ligne, c'est un bord du triangle
            // sinon c'est l'intérieur du triangle
            if ($i == $size || $j == 1 || $j == $i) {
                echo $charBord;
            } else {
                echo $charInterieur;
            }
        }
        // On passe à la ligne pour préparer l'affichage de la prochaine ligne
        echo PHP_EOL;
    }

}


// ==================================================
// ===             Menu de sélection              ===
// ==================================================
$restart = "y";
while ($restart == "y") {
    $choice = -1;
    while ($choice < 1 || $choice > 2) {
        echo "Quel type de triangle voulez-vous afficher ? \n"
            . "\t1 - Triangle isocèle\n"
            . "\t2 - Triangle rectangle\n\n";

        $choice = readline("Votre choix : ");
    }

    switch ($choice) {
        case 1:
            afficherTriangleIsocele(readline("Quel caractère souhaitez-vous utiliser pour l'affichage ? "));
            break;
        case 2:
            afficherTriangleRectangle(readline("Caractère pour les bords du triangle : "), readline("Caractère pour l'intérieur du triangle : "));
            break;
        default:
            echo "ERROR: selection invalide";
    }

    $restart = strtolower(readline("Voulez afficher un autre triangle ? (y/N) "));
}