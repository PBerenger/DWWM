<?php
echo "Exercice 2"."\n"."\n";

    // 1 -- Ecrire un algorithme qui demande un nombre à l’utilisateur, et l’informe ensuite si ce nombre est positif ou négatif (on laisse de côté le cas où le nombre vaut zéro).

// $demandeNbr =readline("Saisissez un nombre ici : ");
// $verite = $demandeNbr > 0 ? true : false;
// echo match($verite){
//     true => "positif",
//     false => "negatif"
// }


    // 2 -- Ecrire un algorithme qui demande deux nombres à l’utilisateur et l’informe ensuite si leur produit est négatif ou positif (on laisse de côté le cas où le produit est nul). Attention toutefois : on ne doit pas calculer le produit des deux nombres.

// $demandeNbr1 =readline("Saisissez un premier chiffre ici : ");
// $demandeNbr2 =readline("Saisissez un second chiffre ici : ");
// $verite1 = $demandeNbr1 > 0 ? true : false;
// $verite2 = $demandeNbr2 > 0 ? true : false;
// echo match($verite1){
//     true => "Le chiffre 1 est positif"."\n",
//     false => "Le chiffre 1 est negatif"."\n"
// };
// echo match($verite2){
//     true => "Le chiffre 2 est positif",
//     false => "Le chiffre 2 est negatif"
// };

    //ou

// $n1 = readline("Veuillez entrer un nombre : ");
// $n2 = readline("Veuillez entrer un nombre : ");
    
// echo ($n1 < 0 xor $n2 < 0) ? "Produit négatif" : "Produit positif";



    // 3 -- Ecrire un algorithme qui demande un nombre à l’utilisateur, et l’informe ensuite si ce nombre est positif ou négatif (on inclut cette fois le traitement du cas où le nombre vaut zéro).

// $demandeNbr =readline("Saisissez un nombre ici : ");

// if($demandeNbr == 0){
//     $demandeNbr = "c'est un zero";
// }elseif($demandeNbr <0){
//     $demandeNbr = "c'est négatif";
// }else{
//     $demandeNbr = "C'est positif";
// };

// echo $demandeNbr;


    // 4 -- Ecrire un algorithme qui demande deux nombres à l’utilisateur et l’informe ensuite si le produit est négatif ou positif (on inclut cette fois le traitement du cas où le produit peut être nul). Attention toutefois, on ne doit pas calculer le produit !

// $demandeNbr1 =readline("Saisissez un premier nombre ici : ");
// $demandeNbr2 =readline("Saisissez un second nombre ici : ");

// if($demandeNbr1 == 0)
//     $demandeNbr1 = "c'est un zero";
// elseif($demandeNbr1 <0)
//     $demandeNbr1 = "c'est négatif";
// else
//     $demandeNbr1 = "C'est positif";
// ;

// if($demandeNbr2 == 0)
//     $demandeNbr2 = "c'est un zero";
// elseif($demandeNbr2 <0)
//     $demandeNbr2 = "c'est négatif";
// else
//     $demandeNbr2 = "C'est positif";
// ;

// echo $demandeNbr1."\n";
// echo $demandeNbr2;


    // 5 -- Ecrire un algorithme qui demande l’âge d’un enfant à l’utilisateur. Ensuite, il l’informe de sa catégorie :
    // • "Poussin" de 6 à 7 ans
    // • "Pupille" de 8 à 9 ans
    // • "Minime" de 10 à 11 ans
    // • "Cadet" après 12 ans

// $demandeAge =readline("Saisi ton âge gamin : ");

// if($demandeAge >=6 && $demandeAge <= 7){
//     $demandeAge = "Poussin";
// }elseif($demandeAge >=8 && $demandeAge <= 9){
//     $demandeAge = "Pupille";
// }elseif($demandeAge >=10 && $demandeAge <= 11){
//     $demandeAge = "Minime";
// }elseif($demandeAge >12){
//     $demandeAge = "Cadet";
// }else{
//     $demandeAge ="T'ES TROP JEUNE GAMIN !";
// };

// echo $demandeAge;

//OU

// $userAge = readline("Veuillez entrer votre âge : ");
// $userCategory = match (true) {
//     $userAge >= 12 => 'Cadet',
//     $userAge >= 10 => 'Minime',
//     $userAge >= 8 => 'Pupille',
//     $userAge >= 6 => 'Poussin',
//     default => 'Hors Catégorie',
// };

// echo $userCategory;


    // 6 -- Cet algorithme est destiné à prédire l'avenir, et il doit être infaillible ! Il lira au clavier l’heure et les minutes, et il affichera l’heure qu’il sera une minute plus tard. 
    // Par exemple, si l'utilisateur tape 21 puis 32, l'algorithme doit répondre :
    // "Dans une minute, il sera 21 heures(s) 33".
    // NB : on suppose que l'utilisateur entre une heure valide. Pas besoin donc de la vérifier.

// $demandeHeure =readline("Donne l'heure, toi : ");
// $demandeMinutes =readline("Donne les minutes, toi : ");
// $demandeMinutes =$demandeMinutes +1;

// if ($demandeMinutes >= 60) {
//         $demandeHeure += 1;
//         $demandeMinutes -= 60;
//     }
// if ($demandeHeure >=24 ){
//     $demandeHeure-=24 ;
// }

// $HeuMin = "Dans une minute, il sera ".$demandeHeure." : ".$demandeMinutes;

// echo $HeuMin;


    // 7 -- De même que le précédent, cet algorithme doit demander une heure et en afficher une autre. Mais cette fois, il doit gérer également les secondes, et afficher l'heure qu'il sera une seconde plus tard.
    // Par exemple, si l'utilisateur tape 21, puis 32, puis 8, l'algorithme doit répondre : "Dans une seconde, il sera 21 heures(s), 32 minutes(s) et 9 seconde(s)".
    // NB : là encore, on suppose que l'utilisateur entre une date valide.

    // $heure = readline('Entrez une heure : ');
    // $minute = readline('Entrez une minute : ');
    // $seconde = readline('Entrez une seconde : ') + 1;
    // // Si les secondes dépassent 59, on ajuste les secondes et les minutes
    // if ($seconde >= 60) {
    //     $minute += 1;
    //     $seconde -= 60;
    // }
    
    // // Si les minutes dépassent 59, on ajuste l'heure et les minutes
    
    // if ($minute >= 60) {
    //     $heure += 1;
    //     $minute -= 60;
    // }
    
    
    // if ($heure >=24 ){
    //     $heure-=24 ;
    // }
    
    // echo "Dans une seconde, il sera $heure heure(s), $minute minute(s) et $seconde seconde(s) .";



    // 8 -- Un magasin de reprographie facture 0,10 E les dix premières photocopies, 0,09 E les vingt suivantes et 0,08 E au-delà. Ecrivez un algorithme qui demande à l’utilisateur le nombre de photocopies effectuées et qui affiche la facture correspondante.


    // $nbPhotocopies = readline("Entrez le nombre de photocopies : ");
    // $prix;
    // switch(true){
    //     case ($nbPhotocopies <= 10):
    //         $prix = $nbPhotocopies * 0.10;
    //         break;
        
    //     case ($nbPhotocopies <= 30):
    //         $prix = 10 * 0.10 + ($nbPhotocopies - 10) * 0.09 ;
    //         break;
    
    //     case ($nbPhotocopies > 30):
    //         $prix = 10 * 0.10 + 20 * 0.09 + ($nbPhotocopies - 30) * 0.08;
    //         break;
    
    //     default:
    //         echo "Valeur incorrecte";
    //         break;   
    // }
    // echo "La facture des photocopies est de $prix €.\n\n";



    // 9 -- Les habitants d’une ville paient l’impôt selon les règles suivantes :
    // • Les hommes de plus de 20 ans paient l’impôt
    // • Les femmes paient l’impôt si elles ont entre 18 et 35 ans
    // • Les autres ne paient pas d’impôt
    // Le programme demandera donc l’âge et le sexe, et se prononcera donc ensuite sur le fait que l’habitant est imposable.


    // $sexe = readline("Indiquez votre sexe : ");
    // $age = readline("Indiquez votre age : ");
    
    // if($sexe == "Homme" && $age >= 20){
    //     echo "Vous êtes imposable";
    // }elseif($sexe == "Femme" && $age >=18 && $age <=35 ){
    //     echo "Vous êtes imposable";
    // }else{
    //     echo "Vous ne payez pas d'impots !";
    // }


    // 10 -- Ecrivez un algorithme qui après avoir demandé un numéro de jour, de mois et d'année à l'utilisateur, renvoie s'il s'agit d’une année bissextile.
    // Petit rappel :
    // • Une année est bissextile si elle est divisible par quatre
    // • Les années divisibles par 100 ne sont pas bissextiles, mais les années divisibles par 400 le sont.


$userDay = readline('Veuillez entrer le jour : ');
$userMonth = readline('Veuillez entrer le mois : ');
$userYear = readline('Veuillez entrer l\'année : ');

if ($userYear % 4 === 0 && ($userYear % 400 === 0 || !($userYear % 100 === 0))) {
    echo "L'année {$userYear} est bissextile"; 
} else {
    echo "L'année n'est pas bissextile";
}

    // OU

    
    $userDay = readline('Veuillez entrer le jour : ');
    $userMonth = readline('Veuillez entrer le mois : ');
    $userYear = readline('Veuillez entrer l\'année : ');
    $estBisextile;
    
    if ($userYear % 4 === 0 && ($userYear % 400 === 0 || !($userYear % 100 === 0))) { 
        $estBisextile = true;
    } else {
        $estBisextile = false;
    }
    
    if ($estBisextile) {
        $numOfDayInMonth = [31, 29, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
    
        // echo 'L\'année est bissextile et il y a ' . $numOfDayInMonth[--$userMonth] . ' jours';
        echo "L'année est bissextile et il y a {$numOfDayInMonth[--$userMonth]} jours";
    } else {
        echo "L'année n'est pas bissextile";
    }


?>