<?php

//Création du tableau
$biblio = [];

function demanderLivre()
{
    $id = readline("Entrez l'ID : \n");
    $titre = readline("Entrez le titre : \n");
    $auteur = readline("Entrez l'auteur : ");
    $anneeP = readline("Entrée l'année de publication : \n");
    $genre = readline("Entrez le genre : \n\n");

    //Créé un tableau dans la mémoire
    return [$id, $titre, $auteur, $anneeP, $genre];
}

//Fonction pour ajouter un livre
function ajouterLivre(&$biblio, $id, $titre, $auteur, $anneeP, $genre)
{
    $biblio[$id] = [
        "titre" => $titre,
        "auteur" => $auteur,
        "anneePublication" => $anneeP,
        "genre" => $genre
    ];
}

//Fonction pour afficher les livres
function afficherLivres($biblio) {
    foreach ($biblio as $id => $livre) {
        echo "ID : $id\n";
        echo "Titre : " . $livre['titre'] . "\n";
        echo "Auteur : " . $livre['auteur'] . "\n";
        echo "Annee de publication : " . $livre['anneePublication'] . "\n";
        echo "Genre : " . $livre['genre'] . "\n";
        echo "-------------------------------------------------\n";
    }
}

// Fonction modifier UN livre
function modifierLivres($biblio)
{
    foreach ($biblio as $id => $livre) {
        echo "-------------------------------------------------\n";
        echo "Livre ID: $id - Titre: " . $livre['titre'] . ", Auteur: " . $livre['auteur'] . ", Année: " . $livre['annee'] . ", Genre: " . $livre['genre'] ."\n";
        echo "=================================================\n";
    }

    // Demander à l'utilisateur de choisir le livre à modifier
    echo "-----------------------------------------------------------\n";
    echo "Quel livre voulez-vous modifier ? (Entrez l'ID du livre) : \n";
    echo "-----------------------------------------------------------\n\n";
    $idChoisi = trim(fgets(STDIN));

    // Vérifier si l'ID existe dans la bibliothèque
    if (array_key_exists($idChoisi, $biblio)) {
        // Demander les nouvelles informations du livre
        echo "Entrez le nouveau titre : ";
        $nouveauTitre = trim(fgets(STDIN));
        echo "-------------------------------------------------\n";

        echo "Entrez le nouvel auteur : ";
        $nouvelAuteur = trim(fgets(STDIN));
        echo "-------------------------------------------------\n";

        echo "Entrez la nouvelle année : ";
        $nouvelleAnnee = trim(fgets(STDIN));
        echo "-------------------------------------------------\n";

        echo "Entrez le nouveau genre : ";
        $nouveauGenre = trim(fgets(STDIN));
        echo "-------------------------------------------------\n";

        // Mettre à jour les informations du livre
        $biblio[$idChoisi]['titre'] = $nouveauTitre;
        $biblio[$idChoisi]['auteur'] = $nouvelAuteur;
        $biblio[$idChoisi]['anneePublication'] = $nouvelleAnnee;
        $biblio[$idChoisi]['genre'] = $nouveauGenre;

        echo "||============================||\n";
        echo "|| Le livre a été mis à jour. ||\n";
        echo "||============================||\n\n";
    } else {
        echo "------------------------------------------------\n";
        echo "L'ID du livre n'existe pas dans la bibliothèque.\n";
        echo "------------------------------------------------\n\n";
    }

    return $biblio;
}

    // Supprimer un livre