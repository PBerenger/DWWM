<?php

//===========================================
//          Afficher un tableau
//===========================================

// $T = [
//     [1, 2, 3, 4, 5, 6, 7, 8],
//     [9, 10, 11, 12, 13, 14, 15, 16],
//     [17, 18, 19, 20, 21, 22, 23, 24],
//     [25, 26, 27, 28, 29, 30, 31, 32],
//     [33, 34, 35, 36, 37, 38, 39, 40],
//     [41, 42, 43, 44, 45, 46, 47, 48],
//     [49, 50, 51, 52, 53, 54, 55, 56],
//     [57, 58, 59, 60, 61, 62, 63, 64],
//     [65, 66, 67, 68, 69, 70, 71, 72],
//     [73, 74, 75, 76, 77, 78, 79, 80],
//     [81, 82, 83, 84, 85, 86, 87, 88],
//     [89, 90, 91, 92, 93, 94, 95, 96],
//     [97, 98, 99, 100, 101, 102, 103, 10],
// ];

// foreach($T AS $values) {
//     foreach($values AS $all) {
//         echo $all . ' ';
//     }
//     echo " \n";
// }

//============================================
//============================================

// 1°) Soit un tableau T à deux dimensions (12, 8) préalablement rempli de valeurs numériques. Écrire un algorithme qui recherche la plus grande valeur au sein de ce tableau

// $T = [
//     [1, 2, 3, 4, 5, 6, 7, 8],
//     [9, 10, 11, 12, 13, 14, 15, 16],
//     [17, 18, 19, 20, 21, 22, 23, 24],
//     [25, 26, 27, 28, 29, 30, 31, 32],
//     [33, 34, 35, 36, 37, 38, 39, 40],
//     [41, 42, 43, 44, 45, 46, 47, 48],
//     [49, 50, 51, 52, 53, 54, 55, 56],
//     [57, 58, 59, 60, 61, 62, 63, 64],
//     [65, 66, 67, 68, 69, 70, 71, 72],
//     [73, 74, 75, 76, 77, 78, 79, 80],
//     [81, 82, 83, 84, 85, 86, 87, 88],
//     [89, 90, 91, 92, 93, 94, 95, 96]
// ];

// // Initialisation de la variable pour stocker la plus grande valeur
// $maxValue = $T[0][0];

// // Parcours du tableau pour trouver la plus grande valeur
// for ($i = 0; $i < 12; $i++) {
//     for ($j = 0; $j < 8; $j++) {
//         if ($T[$i][$j] > $maxValue) {
//             $maxValue = $T[$i][$j];
//         }
//     }
// }

// // Affichage de la plus grande valeur
// echo "La plus grande valeur du tableau est : " . $maxValue;




// 2°)Pour chacune des figures suivantes, écrire et commenter votre algorithme


// Triangle isocèle

// $tab = [];

// for($i = 1; $i <= 7; $i++) {
//     for($j = 1; $j <= 7; $j++) {
//         if($j <= $i) {
//             $tab[$i][$j] = "*"; // intérieur du triangle
//         } else {
//             $tab[$i][$j] = " "; // extérieur du triangle
//         }
//         echo $tab[$i][$j] . " ";
//     }
//     echo "\n";
// }

// for($i = 1; $i <= 7; $i++) {
//     for($j = 7; $j > 0; $j--) {
//         if($j <= $i) {
//             $tab[$i][$j] = " "; // intérieur du triangle
//         } else {
//             $tab[$i][$j] = "*"; // extérieur du triangle
//         }
//         echo $tab[$i][$j] . " ";
//     }
//     echo "\n";
// }


//=====================================
// correction

// $etoile = "*";

// $tab = [];


// for ($i=1; $i <= 7; $i++) { 
// $ligne = str_repeat($etoile, $i);
// array_push($tab, $ligne);
// }

// for ($i= 6 ; $i >= 1 ; $i--) { 
//     $ligne = str_repeat($etoile , $i);
//     array_push($tab, $ligne);
// }

// foreach ($tab as $ligne) {
// echo $ligne , "\n";
// }


//=====================================
//=====================================

//triangle rectangle

// $T = [
//     ["X"],
//     ["XX"],
//     ["XOX"],
//     ["XOOX"],
//     ["XOOOX"],
//     ["XOOOOX"],
//     ["XOOOOOX"],
//     ["XXXXXXXX"],
// ];

// foreach($T AS $values) {
//     foreach($values AS $all) {
//         echo $all . ' ';
//     }
//     echo " \n";
// }


//=====================================
// correction

// $tab =[];
// $etoile = "X";
// $rond = "0" ;

// for ($i=0; $i < 8; $i++) { 
//     $ligne = str_repeat($etoile, $i);
    
//     if ($i < 3 || $i > 6) {
//         array_push($tab, $ligne);
//     }else{
//         $ligne = str_repeat($etoile, 1) . str_repeat($rond, $i - 2) . str_repeat($etoile, 1);
//         array_push($tab, $ligne);

//     }
// }

// foreach ($tab as $ligne) {
//     echo $ligne , "\n";
// }


//=====================================
//=====================================
//=====================================


// programme exemple

// Faire des triangles

function demanderTailleTriangle()
{
    // Tant que la taille est négative, égale à zéro ou n'est pas un nombre, on demande à l'utilisateur d'entrer une taille valide
    $size = 0;
    while ($size <= 0 || !is_numeric($size)) {
        $size = readline("Veuillez entrer la taille du triangle (en hauteur) : ");
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