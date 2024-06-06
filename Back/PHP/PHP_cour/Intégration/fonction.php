<?php
// Vérification saisie (si numérique et il ne doit pas être inférieur ou égal à zero)
function verifieSaisie($value) {
    if (!is_numeric($value) || $value <= 0) {
        echo "Nombre invalide, recommencez : \n";
        return false;
    }
    return true;
}

// fonction calcul du cercle
function calculeRayon($rayon) {

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
function demanderNombre($message){
    $nbreValide = false;
    while(!$nbreValide){
        echo $message;
        $saisie =readline();
        $nbreValide = verifieSaisie($saisie);
    }
    return $saisie;
}

//Fonction pour afficher le menu et obtenir le chois de l'utilisateur

function afficherMenu(){
    echo "\n";
    echo "-----------------------------------------\n";
    echo "Menu :\n";
    echo "1. Addition\n";
    echo "2. soustraction\n";
    echo "3. Multiplication\n";
    echo "4. Division\n";
    $choix = readline("entrez le numéro de l'opération que vous voulez effectuer :\n");
    echo "-----------------------------------------\n";
    return $choix;

}

//fonction pour effectuer l'opération choisie par l'utilisateur

function operation($choix,$nombre1,$nombre2){

    switch($choix){
        case 1: 
            $resultat = $nombre1 + $nombre2;
            echo "Le résultat de l'adition est : $resultat\n";
            break;
        
        case 2: 
            $resultat = $nombre1 - $nombre2;
            echo "Le résultat de la soustraction est : $resultat\n";
            break;
        
        case 3:
            $resultat = $nombre1 * $nombre2;
            echo "Le résultat de la multiplication est : $resultat\n";
            break;
        
        case 4:

            //Vérification du deuxième nombre
            if($nombre2 != 0){
                $resultat = $nombre1 / $nombre2;
                echo "Le résultat de la division est : $resultat\n";
            }else{
                echo "erreur : division par zéro \n";
            }
            break;
        default:
        echo "Choix invalide\n";
    }

}

//Fonction pour demander à l'utilisateur s'il veut continuer ou quitter

function continuer(){
    $reponse = readline("Voulez-vous effectuer une autre opération ? (o/n) :");
    return strtolower($reponse) == "o";
}

?>
