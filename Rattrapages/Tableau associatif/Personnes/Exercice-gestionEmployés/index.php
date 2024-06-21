<?php
require "fonctions.php";

$employes = [];

for ($i = 0; $i < 1; $i++) {
    $nom = readline("Entrez le Nom " . ($i + 1) . " : " . "\n");
    $poste = readline("Entrez le Poste " . ($i + 1) . " : " . "\n");
    $salaire = readline("Entrez le Salaire " . ($i + 1) . " : " . "\n");

    $employes[] = [
        'nom' => $nom,
        'poste' => $poste,
        'salaire' => $salaire
    ];
}
// ajouterEmploye($employe, $id, $nom, $poste, $salaire);

echo afficherEmployes($employes);
