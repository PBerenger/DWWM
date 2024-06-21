<?php

    $personne = [
        "nom" => "Dupont",
        "prenom" => "Henri",
        "age" =>30,
        "profession" => "developpeur"
    ];


    echo "son nom est monsieur" . " " . $personne["nom"] . "\n\n";

    // tout afficher (simple)

    // echo "nom : " . $personne['nom'] . "\n";
    // echo "prenom : " . $personne['prenom'] . "\n";
    // echo "age : " . $personne['age'] . "\n";
    // echo "profession : " . $personne['profession'] . "\n";


    // ajouter une valeur
    $personne["salaire"] = 50000;

    // modifier une valeure existante (a changer car c'est une 'affectation' donc elle écrase la premiere valeure)
    $personne["profession"] = "Chef de projet";
    
    // Pour supprimer une donnée ('unset')
    // créer valeur pour supprimer
    $cleASup = readline("Entrez clé à supprimer (nom, prenom, age, profession) : ");
    //réutiliser la valeur pour suprimer automatiquement
    unset($personne[$cleASup]);

    
    // tout afficher (foreach [VERSION UTILISEE] - ucfirst met les premiere lettres en majuscule automatiquement)
    foreach($personne as $key => $value) {
        echo ucfirst($key) . " : " . $value. "\n";
    }




 ?>   