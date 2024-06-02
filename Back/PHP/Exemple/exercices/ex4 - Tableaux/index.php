<?php

// LES TABLEAUX


//================================
//      BASES
//================================

$tab = [
    "Banane" => ["HT" => 25, "Stock" => 12, "TVA" => 5],
    "Pomme" => ["HT" => 7, "Stock" => 45, "TVA" => 7],
    "Poire" => ["HT" => 39, "Stock" => 2, "TVA" => 3],
];

//====================
// Afficher le tableau
//====================

foreach($tab AS $key => $valFruits) {
    echo "Noms des fruits : " . $key . "\n";
    foreach($valFruits AS $spec => $valeur) {
        echo $spec . " : " . $valeur . "\n";
    }
    echo " \n";
}

//==============================================
//==============================================


// 1)  Écrire un programme qui déclare un tableau de 9 notes, dont on fait ensuite saisir les valeurs par utilisateurs.
// Calculez la moyenne des notes.

// $notes=[];
// for($i= 0;$i<9;$i++){
//     $notes[$i] = readline("Entrez une valeur " . ($i + 1) . " : ");
//     while (!is_numeric($notes[$i]) || $notes[$i] < 1 || $notes[$i] > 9) {
//         echo "Entrez un nombre valide !\n";
//         $notes[$i] = readline("Entrez une nouvelle valeur (entre 0 et 10). " . ($i + 1) . " : ");
//     }
// }

// // Calculer la moyenne
// $sum = array_sum($notes);
// $moy = $sum/count($notes);
// echo "Voici la moyenne des valeurs : " . $moy;



// 2) Ecrivez un algorithme permettant à l’utilisateur de saisir un nombre quelconque de valeurs, qui devront être stockées dans un tableau. L’utilisateur doit donc commencer par entrer le nombre de valeurs qu’il compte saisir. Il effectuera ensuite cette saisie. Enfin, une fois la saisie terminée, le programme affichera le nombre de valeurs négatives et le nombre de valeurs positives.

// // Demander à l'utilisateur le nombre de valeurs à saisir
// echo "Combien de valeurs voulez-vous saisir ? ";
// $nbValeurs = intval(fgets(STDIN)); // Lire la valeur saisie par l'utilisateur et la convertir en entier

// // Initialiser le tableau pour stocker les valeurs
// $valeurs = array();

// // Saisir les valeurs
// for ($i = 0; $i < $nbValeurs; $i++) {
//     echo "Veuillez entrer la valeur " . ($i + 1) . ": ";
//     $valeurs[] = intval(fgets(STDIN)); // Lire la valeur saisie et la convertir en entier
// }

// // Initialiser les compteurs pour les valeurs positives et négatives
// $positives = 0;
// $negatives = 0;

// // Parcourir le tableau et compter les valeurs positives et négatives
// foreach ($valeurs as $valeur) {
//     if ($valeur > 0) {
//         $positives++;
//     } elseif ($valeur < 0) {
//         $negatives++;
//     }
// }

// // Afficher les résultats
// echo "Nombre de valeurs positives: " . $positives . PHP_EOL;
// echo "Nombre de valeurs négatives: " . $negatives . "\n";



// 3°) Ecrivez un algorithme calculant la somme des valeurs d’un tableau (on suppose que le tableau a été préalablement saisi).


// $tab = [1, 8, 3, 4, 5];
// $total = 0;

// for ($i = 0; $i < count($tab); $i++) { 
//      $total += $tab[$i];
// }

// echo "Total : " . $total;



// 4°) Ecrivez un algorithme constituant un tableau, à partir de deux tableaux de même longueur préalablement saisis. Le nouveau tableau sera la somme des éléments des deux tableaux de départ.


// function afficherTab($tab, $nomTab){
//     echo "$nomTab : ";
//     foreach($tab as $index => $valeur){ 
//         echo "$valeur ";
//     }
//     echo "\n";
// }

// $tab_1 = [4, 8, 7, 9, 1, 5, 4, 6];
// $tab_2 = [7, 6, 5, 2, 1, 3, 7, 4];

// afficherTab($tab_1, "Tableau 1");
// afficherTab($tab_2, "Tableau 2");


// for($i=0; $i<count($tab_1); $i++){
//     $tab_3[$i] = $tab_1[$i] + $tab_2[$i];
// }

// afficherTab($tab_3, "Tableau 3");



// 5°) Ecrivez un algorithme permettant, toujours sur le même principe, à l’utilisateur de saisir un nombre déterminé de valeurs. Le programme, une fois la saisie terminée, renvoie la plus grande valeur en précisant quelle position elle occupe dans le tableau. On prendra soin d’effectuer la saisie dans un premier temps, et la recherche de la plus grande valeur du tableau dans un second temps.


$arraySize = readline("Entrez la longueur du tableau : ");
$arr = [];

for ($i = 0; $i < $arraySize; $i++) {
    $arr[$i] = readline("Entrez un nombre : ");
}

//=======================================================
//                  With for loop
//=======================================================
$max = $arr[0];
$index = 0;

for ($i = 1; $i < $arraySize; $i++) {
    if ($arr[$i] > $max) {
        $max = $arr[$i];
        $index = $i;
    }
}

echo "The max value is at index {$index} and is {$max}";



// 6°) Toujours et encore sur le même principe, écrivez un algorithme permettant, à l’utilisateur de saisir les notes d'une classe. Le programme, une fois la saisie terminée, renvoie le nombre de ces notes supérieures à la moyenne de la classe.


// $arrayLength = readline("Veuillez entrer la taille du tableau : ");
// $arr = [];

// for ($i = 0; $i < $arrayLength; $i++) {
//     $arr[$i] = readline("Veuillez entrer une note : ");
// }

// $average = array_sum($arr) / $arrayLength;

// echo "moyenne : " . $average . "\n";

// foreach ($arr as $value) {
//     if ($value > $average) {
//         echo $value . " est au dessus de la moyenne \n";
//     }
// }

// 7°) A partir de deux tableaux contenant l’un des prix et l’autre des quantités de produits achetés, écrire un programme permettant de calculer le prix total.
// Pour calculer le total, il faut additionner le résultat de la multiplication des prix par des quantités.


// $prix = [5, 50, 23, 11];
// $quantite = [10, 1, 4, 3];  
// $tab3 = [];

// for ($i = 0; $i < count($prix); $i++) {
//     $tab3[] = $prix[$i] * $quantite[$i]; 
// }


// $total = array_sum($tab3);
// echo "La somme totale est : " . $total;