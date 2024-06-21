<?php

require("functions.php");

// Tant que
while (true) {
    echo "\n";
    echo "^                          ^\n";
    echo "|==========================|\n";
    echo "|1. Ajouter livre          |\n";
    echo "|2. Modifier livre         |\n";
    echo "|3. Supprimer livre        |\n";
    echo "|4. Afficher les livres    |\n";
    echo "|5. Information d'un livre |\n";
    echo "|6. Quitter                |\n";
    echo "|==========================|\n";
    echo "|\ \ \ \ \ \ __ / / / / / /|\n";
    echo "||========================||\n";
    $choix = readline("||  Entrez votre choix :  ||\n" . "\|========================|/\n\n");
    echo "\n";


    switch ($choix) {
        case 1:
            // Ajout d'un livre avec les informations récupérées
            echo "|/=======================================\|\n";
            echo "|| Ajouter un livre dans la Bibliothèque ||\n";
            echo "|\=======================================/|\n\n";
            $infos = demanderLivre();
            // Ajout du return dans le tableau associatif ($biblio)
            ajouterLivre($biblio, $infos[0], $infos[1], $infos[2], $infos[3], $infos[4]);
            echo "||=====================||\n";
            echo "||Nouveau livre ajouté.||\n";
            echo "||=====================||\n\n";
            afficherLivres($biblio);
            
            break;
        case 2:
            // Modifier un livre
            echo "|/===================\|\n";
            echo "|| Modifier un Livre ||\n";
            echo "|\===================/|\n\n";
            $biblio = modifierLivres($biblio);     
        break;
        case 3:
            // Supprimer un livre
            echo "|/========================\|\n";
            echo "||   Supprimer un livre   ||\n";
            echo "|\========================/|\n\n";
            $isbn = readline("Entrez l'ID du livre à supprimer : ");
            if (supprimerLivre($biblio, $isbn)) {
                echo "||========================||\n";
                echo "||    Livre supprimé.     ||\n";
                echo "||========================||\n\n";
            } else {
                echo "-----------------\n";
                echo "Livre non trouvé.\n";
                echo "-----------------\n\n";
            }
            echo "-------------------------------------------------\n";
            afficherLivres($biblio);
        break;
        case 4:
            // afficher la bibliothèque
            echo "|/=============================\|\n";
            echo "|| Voici toute la bibliothèque ||\n";
            echo "|\=============================/|\n\n";
            afficherLivres($biblio);
        break;
        case 5:
            // Afficher les informations d'un seul livre
            echo "|/========================================\|\n";
            echo "||  Afficher un livre de la bibliothèque  ||\n";
            echo "|\========================================/|\n\n";
            afficherUnLivre($biblio, $id, $idChoisi);
        break;
        case 6:
            exit("  o===========o\n" . "<|| AU REVOIR ||>\n" . "  o===========o\n\n");

        default:
    }

}
