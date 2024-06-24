<?php


//==============================
//          Calcul TTC
//==============================


function calculTTC($prix, $nbArticles, $TVA){
    $totalHT = $nbArticles * $prix;
    $totalTTC = $totalHT + ($totalHT * ($TVA / 100));

    return $totalTTC;
}


//==============================
//            PGCD
//==============================


function pgcd($nbre1, $nbre2) {
    while ($nbre2 != 0) {
        $nbre3 = $nbre2;
        $nbre2 = $nbre1 % $nbre2;
        $nbre1 = $nbre3;
    }
    return $nbre1;
}


//==============================
//        PPCM  
//==============================


function ppcm($nbre1, $nbre2) {

    $res = $nbre1 * $nbre2;
    while ($nbre2 != 0) {
        $r = $nbre1 % $nbre2;
        $nbre1 = $nbre2;
        $nbre2 = $r;
    }

    $pgcd = $nbre1;
    $ppcm = $res / $pgcd;

    return $ppcm;
}


//==============================
//          MULTIPLACATION
//==============================


function multiplication($nbre1) {
    $result = [];
    for ($i = 0; $i <= 10; $i++) {
        $result[$i] = $nbre1 * $i;
    } 
    return $result;
}


//==============================
//          FACTORIELLE
//==============================


function facto($num){
     
    $fac = 1;  
    for ($i=$num; $i>=1; $i--)   
    {  
      $fac = $fac * $i;  
      
    }  
    return $fac; 
    }


//==============================
//            SOMME
//==============================



