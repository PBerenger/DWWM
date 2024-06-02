<?php
// GRAND UN
// 1. Ecrire un algorithme qui demande à l’utilisateur un nombre compris entre 1 et 3 jusqu’à ce que la réponse convienne.


//Boucle jusqu'à ce que la réponse convienne
do {
    // Demande à l'utilisateur d'entrer un nombre
    $nombre = readline("Veuillez entrer un nombre entre 1 et 3 : ");

    // Vérification si le nombre est compris entre 1 et 3
    // Si non, on affiche un message d'erreur
    if ($nombre < 1 or $nombre > 3) {
        echo "Nombre invalide. Veuillez réessayer.\n";
    }
} while ($nombre < 1 || $nombre > 3); // Répéter tant que la réponse n'est pas valide

// Affichage du nombre valide
echo "Vous avez saisi : $nombre\n";

// OU

// $i = 0;

// while ($i <1 || $i > 3) {
//     $i = readline("choisir un nombre entre 1 et 3 \n");
// }

// echo $i ."Vous avez trouvé\n";


//-----------------------------------------------------------------------------------------------------

// 2. Ecrire un algorithme qui demande un nombre compris entre 10 et 20, jusqu’à ce que la réponse convienne. En cas de réponse supérieure à 20, on fera apparaître un message : « Plus petit ! », et inversement, « Plus grand ! » si le nombre est inférieur à 10.

// do {
//     $nbr = readline("Ecrire un chiffre entre 1 et 10 : ");

//     if ($nbr <10) {
//         echo "C'est plus haut. Réessaie : ";
//     }
//     elseif ($nbr > 20) {
//         echo "C'est plus petit. Pffff... ";
//     }
// } while ($nbr <10 || $nbr > 20);

// echo "OUIIIIIII : $nbr" . " !!! " . "C'est bien mon grand !";


//-----------------------------------------------------------------------------------------------------

// 3. Ecrire un algorithme qui demande un nombre de départ, et qui ensuite affiche les dix nombres suivants. Par exemple, si l'utilisateur entre le nombre 17, le programme affichera les nombres de 18 à 27.

// // Demande à l'utilisateur d'entrer un nombre
// $nrbDepart = readline("Entre un nombre de départ : ");

// // Affiche les dix nombres suivants
// // sachant que le '$i' est le nombre choisi par l'utilisateur
// echo "Les dix nombres suivants sont :\n";
// for ($i = $nrbDepart - 10; $i <= $nrbDepart + 10; $i++) {
//     echo $i . "\n";
// }


//-----------------------------------------------------------------------------------------------------

// 4. Vous devez écrire un programme qui calcul le PGCD de 2 nombres. 
// PGCD = Plus Grand Diviseur Commun, s’écrit PGCD (a ; b)
// Vous devez demander à l’utilisateur deux nombres.


// // Fonction pour calculer le PGCD
// function pgcd($a, $b) {
//     while ($a != 0) {
//         $temp = $a;
//         $a = $b % $a;
//         $b = $temp;
//     }
//     return $b;
// }

// // Nombres à tester
// $a = readline("Entre un premier nombre : ");
// $b = readline("Entre un deuxième nombre : ");

// // Appel de la fonction et affichage du résultat
// $resultat = pgcd($a, $b);
// echo "Le PGCD de $a et $b est : " . $resultat;


//-----------------------------------------------------------------------------------------------------

// 5. Vous devez écrire un programme qui demande à l’utilisateur le PPCM de 2 nombres
// PPCM : Le Plus Petit Multiple Commun, s’écrit PPCM(a,b)


// function ppcm($a, $b)
// {
//     $res = $a * $b;
//     while ($a > 1) {
//         $r = $a % $b;
//         if ($r == 0) {
//             $result = $res / $b;
//             return $result;
//         }
//         $a = $b;
//         $b = $r;
//     }
// }

// // Nombre à tester
// $a = readline("Entre un premier nombre : ");
// $b = readline("Entre un deuxième nombre : ");

// $result = ppcm($a, $b);
// echo "Le PPCM de $a et $b est : " . $result;

    //OU

// function ppcm($a, $b)
// {
//     $res = $a * $b;
//     while ($b != 0) {
//         $r = $a % $b;
//         $a = $b;
//         $b = $r;
//     }
//     return $res / $a;
// }

// $a = intval(readline("Entre un premier nombre : "));
// $b = intval(readline("Entre un deuxième nombre : "));

// $result = ppcm($a, $b);
// echo "Le PPCM de $a et $b est : " . $result;


//================================================================================

// DO WHILE-----------------------------------------------------------------------


// $compt = 1;

// do {
//     echo "compteur : " . $compt . "\n";
//     $compt++;
// } while ($compt <=1000000000);

//================================================================================

// FOR----------------------------------------------------------------------------


// for ($i = 1; $i <= 100; $i++){
//     echo $i . " ";
// }


// GRAND DEUX
// exercices - FOR----------------------------------------------------------------

// 1 - Écrire un algorithme permettant de générer un chiffre entre 1 et 9 de manière aléatoire
// Afficher la table de multiplication du nombre aléatoire généré en respectant le formatage attendu.

// Demande à l'utilisateur d'entrer un nombre
// $nbrDepart = mt_rand(1, 9);

// // Affiche les dix nombres suivants
// // sachant que le '$i' est le nombre est le multiplicateur
// echo "La table de multiplication de ce chiffre est :\n";
// for ($i = 1; $i <= 10; $i++) {
//     $res = $nbrDepart * $i;
//     echo $i . " x " . $nbrDepart . " = " . $res . "\n";
// }


//--------------------------------------------------------------------------------

// 2 - Écrire un algorithme qui demande à l’utilisateur de saisir un nombre entier affiche ensuite les 5 nombre précédents et suivants.

// // Demande à l'utilisateur d'entrer un nombre
// $nrbDepart = readline("Entre un nombre de départ : ");

// // Affiche les dix nombres suivants
// // sachant que le '$i' est le nombre choisi par l'utilisateur
// echo "Les nombres sont :\n";
// for ($i = $nrbDepart - 5; $i <= $nrbDepart + 5; $i++) {
//     echo $i . "\n";
// }

// OU


// $nbre = readline("Entrez un nombre : ");
// $nbreFin = $nbre-5;

// for ($i=$nbre; $i > $nbreFin; $i--) { 
//     echo $i-1 . " "."\n";
// }


// $nbreFin = $nbre+4;

// for ($i=$nbre; $i <= $nbreFin; $i++) { 
//     echo $i+1 ." "."\n";
// }



//----------------------------------------------------------------------------------

// 3 - Écrire un programme qui demande un nombre à l’utilisateur et calcul sa factorielle
// La factorielle de 8, notée 8 ! vaut : 1 * 2* 3 * 4 * 5 * 6 * 7 * 8 = 40320

// $nbrDepart = readline("Entre un nombre Magle : ");
// $fact = 1;

// for ($i = 1; $i <= $nbrDepart; $i++) {
// $fact *= $i;
// // ecrit autrement => $fact = $fact * $i;
// }
// echo $fact . "\n";


//-----------------------------------------------------------------------------------

// 4 -  Écrire un programme qui permet de saisir 5 nombres entiers et d’afficher le plus grand nombre à la fin et le plus petit.


// // Fonction pour trouver le plus grand nombre parmi un tableau de nombres
// function trouverPlusGrand($nombres) {
//     $plusGrand = $nombres[0];
//     foreach ($nombres as $nombre) {
//         if ($nombre > $plusGrand) {
//             $plusGrand = $nombre;
//         }
//     }
//     return $plusGrand;
// }

// // Fonction pour trouver le plus petit nombre parmi un tableau de nombres
// function trouverPlusPetit($nombres) {
//     $plusPetit = $nombres[0];
//     foreach ($nombres as $nombre) {
//         if ($nombre < $plusPetit) {
//             $plusPetit = $nombre;
//         }
//     }
//     return $plusPetit;
// }

// // Saisie des 5 nombres entiers
// $nombres = array();
// for ($i = 0; $i <= 4; $i++) {
//     $nombres[$i] = readline("Entrez le nombre $i : ");
// }

// // Affichage du plus grand et du plus petit nombre
// $plusGrand = trouverPlusGrand($nombres);
// $plusPetit = trouverPlusPetit($nombres);
// echo "Le plus grand nombre est : $plusGrand\n";
// echo "Le plus petit nombre est : $plusPetit\n";


// OU (mieux)

// $highNombre= readline("Entrez un nombre : ");
// $lowNombre = $highNombre;

// for($i=0; $i<4 ; $i++){
//     $nombre = readline("Entrez un nombre : ");
//     if($nombre > $highNombre){
//         $highNombre = $nombre;
//     }elseif($nombre < $lowNombre){
//         $lowNombre = $nombre;
//     }
// }

// echo "Nombre le plus grand : $highNombre\n";
// echo "Nombre le plus petit : $lowNombre";