<?php


echo "exercice 1"."\n"."\n";


// 1 -- Ecrire un programme qui demande un nombre à l’utilisateur, puis qui calcule et affiche le carré de ce nombre
// $demandeNbr =readline("Saisissez un nombre ici : ");
// $demandeNbr =$demandeNbr **2;
// echo $demandeNbr;


// 2 -- Ecrire un programme qui demande son prénom à l'utilisateur, et qui lui réponde par un charmant « Bonjour » suivi du prénom.
// $demandePre =readline("Saisissez votre prénom ici : ");
// echo "Bonjour $demandePre"; 


// 3 -- Ecrire un programme qui lit le prix HT d’un article, le nombre d’articles et le taux de TVA, et qui fournit le prix total TTC correspondant. Faire en sorte que des libellés apparaissent clairement.
$prix = readline("Entrez un prix HT : ");
$nbArticles = readline("Entrez le nombre d'articles : ");
$TVA = readline("Entrez la TVA : ");

$totalHT = $nbArticles * $prix;
$totalTTC = $totalHT + ($totalHT * ($TVA / 100));

echo $totalTTC;

?>