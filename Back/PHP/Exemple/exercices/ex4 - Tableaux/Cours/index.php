<?php

$tab = [12,14,15,18,10];
for($i=0;$i<count($tab);$i++){
    echo $tab[$i] . "\n";
}


$tab = ["Pierre",'Paul',"J'adore"];
for($i=0;$i<count($tab);$i++){
    echo $tab[$i] . "\n";
}


$tab = ["Odette",'Phil',"J'avoue"];
foreach($tab as $i => $value) {
    echo $i . ":" . $value . "\n";
}
//OU
$tab = ["Odette",'Phil',"J'avoue"];
foreach($tab as $value) {
    echo ":" . $value . "\n";
}


// remplir le tableau par l'utilisateur:

$notes=[];
for($i= 0;$i<5;$i++){
    $notes[$i] = readline("Nombre : ");
}
foreach($notes as $value) {
    echo $value . "\n";
}
//OU
// $notes=[];
// for($i= 0;$i<3;$i++){
//     $saisie[$i] = readline("Nombre : ");   
//     $notes[$i] = $saisie:   //permet d'utiliser la fonction par la suite si on veut lui donner des instructions.
// }
// foreach($notes as $value) {
//     echo $value . "\n";
// }