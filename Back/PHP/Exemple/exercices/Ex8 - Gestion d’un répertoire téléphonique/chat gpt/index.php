<?php

// Tableau pour stocker les contacts
$contacts = [];

// Fonction pour ajouter un nouveau contact
function ajouterContact(&$contacts, $nom, $telephone) {
    $contacts[] = ["nom" => $nom, "telephone" => $telephone];
    echo "Contact ajouté avec succès.\n";
}

// Fonction pour rechercher un contact par nom
function rechercherContact($contacts, $nom) {
    foreach ($contacts as $contact) {
        if ($contact["nom"] == $nom) {
            return $contact;
        }
    }
    return null;
}

// Fonction pour afficher tous les contacts
function afficherContacts($contacts) {
    if (empty($contacts)) {
        echo "Aucun contact dans le répertoire.\n";
    } else {
        foreach ($contacts as $contact) {
            echo "Nom: " . $contact["nom"] . ", Téléphone: " . $contact["telephone"] . "\n";
        }
    }
}

// Fonction pour afficher le menu principal
function afficherMenu() {
    echo "Menu Principal:\n";
    echo "1. Ajouter un contact\n";
    echo "2. Rechercher un contact par nom\n";
    echo "3. Afficher tous les contacts\n";
    echo "4. Quitter\n";
    echo "Choisissez une option: ";
}

// Boucle principale du programme
while (true) {
    afficherMenu();
    $choix = trim(fgets(STDIN));

    switch ($choix) {
        case 1:
            echo "Entrez le nom du contact: ";
            $nom = trim(fgets(STDIN));
            echo "Entrez le numéro de téléphone du contact: ";
            $telephone = trim(fgets(STDIN));
            ajouterContact($contacts, $nom, $telephone);
            break;
        case 2:
            echo "Entrez le nom du contact à rechercher: ";
            $nom = trim(fgets(STDIN));
            $contact = rechercherContact($contacts, $nom);
            if ($contact) {
                echo "Contact trouvé: Nom: " . $contact["nom"] . ", Téléphone: " . $contact["telephone"] . "\n";
            } else {
                echo "Contact non trouvé.\n";
            }
            break;
        case 3:
            afficherContacts($contacts);
            break;
        case 4:
            echo "Quitter le programme.\n";
            exit;
        default:
            echo "Option invalide. Veuillez choisir une option valide.\n";
    }
}

?>