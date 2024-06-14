<?php

require("functions.php");

// Tant que
while (true) {
    echo "|=====================|\n";
    echo "|1. Ajouter livre     |\n";
    echo "|2. Modifier livre    |\n";
    echo "|3. Supprimer livre   |\n";
    echo "|4. Afficher livre    |\n";
    echo "|5. Quitter           |\n";
    echo "|=====================|\n\n";
    $choix = readline("Entrez votre choix : ");

    switch ($choix) {
        case 1:
            // Ajout d'un livre avec les informations récupérées
            $infos = demanderLivre();
            // Ajout du return dans le tableau associatif ($biblio)
            ajouterLivre($biblio, $infos[0], $infos[1], $infos[2], $infos[3], $infos[4]);
            echo"Nouveau livre ajouté.\n";
            echo "-------------------------------------------------\n";
            afficherLivres($biblio);
            
            break;
        case 2:
            $biblio = modifierLivres($biblio);     
        break;
        case 3:
            
        break;
        case 4:
            afficherLivres($biblio);
        break;
        case 5:
            exit("Au revoir");

        default:
    }

}
