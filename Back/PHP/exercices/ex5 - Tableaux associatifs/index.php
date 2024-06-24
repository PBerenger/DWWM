<?php
// LES TABLEAUX ASSOCIATIFS

// 1°) Soit le tableau associatif suivant : $chomage = array(‘Autriche' =>4.9, 'Allemagne' =>9.3 ,'Danemark' =>4.8 , ' Espagne' =>9.4 , 'France' =>9.7);
    // 1. A l'aide de la boucle foreach afficher tous les pays et le taux de chômage correspondant

// Creer un tableau associatif rempli
// $tab = [
//     "Autriche"=> "4.9","Allemagne"=> 9.3,"Danemark"=> 4.8,"Espagne"=> 9.4,"France"=> 9.7];

// foreach ($tab as $key => $value) {
//     echo$key .", le taux de chômage est de ". $value ." pour cent. \n";
// };

    // 2. A l'aide d'une boucle, écrire les instructions en PHP permettant de parcourir le tableau et d’afficher le nom des pays européens ayant moins de 5 % de chômage.

// $tab = ["Autriche"=> 4.9,"Allemagne"=> 9.3,"Danemark"=> 4.8,"Espagne"=> 9.4,"France"=> 9.7];

// foreach ($tab as $key => $value) {
//     if ($value < 5) {
//         echo "Le pays ayant moins de 5% de chomage est : ".$key;
//     }
// }


    // 3. Afficher le nom du pays ayant le taux de chômage le plus faible

// $tab = ["Autriche"=> 9.3,"Allemagne"=> 9.3,"Danemark"=> 4.8,"Espagne"=> 9.4,"France"=> 9.7];

    // $value = array_values($tab);
    // $minValue = min($value);
    // echo "Le nom du pays ayant le taux de chômage le plus faible est : " . array_search($minValue, $tab);


//2°) Compléter le tableau suivant avec quelques noms et quelques notes : $tabNotes = array (['boucher'] =>16, ['bourdette'] =>13 .........à compléter
    // 1. A l'aide d'une boucle afficher le nom de chaque élève et la note correspondante

// $tab = ["Boucher"=>16,"Bourdette"=>13,"Dupont"=>3,"Hovox"=>6,"Obelix"=>0,"Bourde"=>18];

// foreach ($tab as $key => $value) {
//     echo $key . " : " . $value ."\n";
// };

    // 2. Afficher la moyenne des notes

// $tab = ["Boucher"=>16,"Bourdette"=>13,"Dupont"=>3,"Hovox"=>6,"Obelix"=>0,"Bourde"=>18];

// foreach ($tab as $key => $value) {
//     $sum = array_sum($tab);
//     $average = $sum / count($tab);
//     echo "La moyenne est de " . $average ."\n";
// };


// 3°) $tabNotes = array(['prenot'] => array (2,10,14), ['perthuis'] => array (10,18,12) …à compléter avec des élèves et des notes de votre choix
    // 1. Afficher le nom et les notes de chaque élève.
    // 2. Afficher le nom et la moyenne de chaque élève
    // 3. Afficher les notes et la moyenne d'un élève dont le nom sera saisi au clavier (attention vous
    // devez vérifier que cet élève est bien présent dans le tableau)
    // 4. Faire un menu pour afficher les questions 1,2,3

// VERSION 1

$tabNotes = array("Boucher" => array(16,12,14), "Bourdette" => array(13,9,8), "Dupuy" => array(15,19,2), "Dufflou"=> array(8,11,1), "Dubois" => array(3,20,0), "Duchamps" => array(12,17,15), "Duchenes" => array(19,20,18), "Dumas" => array(5,4,3));
ksort($tabNotes);
$choix = '';

while($choix != "Q" && $choix != "q"){
    system('clear');
    echo("\n\nQue souhaitez-vous faire ?\n1.Afficher le nom et les notes des élèves\n2.Afficher le nom et la moyenne de chaque élève\n3.Afficher les notes et la moyenne d'un élève choisi\n\n");
    $choix = readline("Choix : ");

    switch($choix){
        case 1:
            $mask = "|%-12.30s |%6.6s |%6.6s |%6.6s |\n";
            printf($mask, 'Nom d\'eleve', 'Note 1', 'Note 2', 'Note 3');
            printf($mask, '', '', '', '', '', '');
        
            foreach($tabNotes as $key => $value){
                printf($mask, $key, $value[0], $value[1], $value[2]);
            }
            readline();
            break;

        case 2:
            $mask = "|%-12.30s |%7.7s |\n";
            printf($mask, 'Nom d\'eleve', 'Moyenne');
            printf($mask, '', '', '', '', '', '');
        
            foreach($tabNotes as $key => $value){
                printf($mask, $key, round((array_sum($value)/count($value)), 1, PHP_ROUND_HALF_UP));
            }
            readline();
            break;
      
            case 3:
                $nomEleve = '';
                $mask = "|%-12.30s |%6.6s |%6.6s |%6.6s |%7.7s |\n";
    
                while(!array_key_exists($nomEleve, $tabNotes)){
                    $nomEleve = readline("De quel élève souhaitez vous afficher les notes ? ");
                }
                printf($mask, 'Nom d\'eleve', 'Note 1', 'Note 2', 'Note 3', 'Moyenne');
                printf($mask, '', '', '', '', '', '');
                printf($mask, $nomEleve, $tabNotes[$nomEleve][0], $tabNotes[$nomEleve][1], $tabNotes[$nomEleve][2], round((array_sum($tabNotes[$nomEleve])/count($tabNotes[$nomEleve])), 1, PHP_ROUND_HALF_UP));
                readline();
                break;
            
            case "Q":
            case "q":
                echo "Au revoir !\n";
                readline();
                break;
            
            default:
                echo "Erreur de synthaxe, veuillez reesayer !\n";
                readline();
                break;
        } 
        system('clear');
    }


    //-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //===================================================================================================================================================================================
    // ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

// VERSION 2


function afficherNotes($tabNotes)
{
    echo "==============================\n";
    echo "   Notes de chaque élèves :   \n";
    echo "==============================\n";
    foreach ($tabNotes as $eleve => $notes) {
        echo "Notes de " . $eleve . " : \n";
        foreach ($notes as $note) {
            echo "\t- " . $note . "/20\n";
        }
    }
    echo PHP_EOL;
}

// 2. Afficher le nom et la moyenne de chaque élève
function afficherMoyenneEleves($tabNotes)
{
    echo "==============================\n";
    echo "  Moyenne de chaque élèves :  \n";
    echo "==============================\n";
    foreach ($tabNotes as $eleve => $notes) {
        $average = array_sum($notes) / count($notes);
        echo $eleve . " : " . number_format($average, 2, ",") . "\n";
    }
}

//  3. Afficher les notes et la moyenne d'un élève dont le nom sera saisi au clavier (attention vous devez vérifier que cet élève est bien présent dans le tableau)
function afficherNoteEleveChoisi($tabNotes)
{

    // Vérification que le nom saisi existe dans le tableau
    $nomEleve = "";
    while (!array_key_exists($nomEleve, $tabNotes)) {
        // Affichage de tous les élèves présent dans le tableau
        echo "Elèves présent : " . implode(", ", array_keys($tabNotes)) . "\n";

        $nomEleve = readline("Veuillez entrer le nom de l'élève dont vous voulez voir les notes : ");
    }

    echo "==============================\n";
    echo "          {$nomEleve} :       \n";
    echo "==============================\n";

    $notesEleve = $tabNotes[$nomEleve];
    echo "Notes : \n";
    foreach ($notesEleve as $note) {
        echo "\t{$note}/20 \n";
    }
    echo "Moyenne de {$nomEleve} : \n" . "\t" . number_format(array_sum($notesEleve) / count($notesEleve), 2, ",");
}



$tabNotes = array(
    "prenot" => [2, 10, 14],
    "perthuis" => [10, 18, 12],
    "paria" => [17, 16, 15],
    "pethro" => [0, 5, 9],
    "perditio" => [12, 11, 14],
);


$continue = "y";
//  4. Faire un menu pour afficher les questions 1,2,3
while ($continue == "y" || $continue == "Q") {

    $choice = 0;
    while ($choice < 1 || $choice > 3) {
        echo "Que voulez-vous faire : \n"
            . "\t1 - Afficher le nom et les notes de chaque élève\n"
            . "\t2 - Afficher le nom et la moyenne de chaque élève\n"
            . "\t3 - Afficher le nom et la moyenne d'un seul élève\n";

        $choice = readline("Votre choix : ");
        echo PHP_EOL;
    }

    switch ($choice) {
        case 1:
            afficherNotes($tabNotes);
            break;
        case 2:
            afficherMoyenneEleves($tabNotes);
            break;
        case 3:
            afficherNoteEleveChoisi($tabNotes);
            break;
        default:
            echo "ERROR: le choix n'est pas valide";
    }

    echo PHP_EOL;
    echo PHP_EOL;

    $continue = readline("Vous voulez faire une autre demande ? (y/N)");
}