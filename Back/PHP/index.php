<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    // echo "Hello World"."<br>";

    // $joueur = "toto";
    // $age = 20;
    // echo "nom du joueur : ".$joueur."\n"."<br>";
    // echo "age du joueur : ".$age."\n";

    // $age++;
    // // ou : $age = age +1;
    // echo "age du joueur : ".$age."<br>"."<br>";

    // // string
    // $a = "helloworld";

    // //int
    // $b = 1;

    // // foalt=double
    // $c = 3.14;

    // //boolean
    // $d = true;

    // echo $a."<br>";
    // echo $b."<br>";
    // echo $c."<br>";
    // echo $d."<br>";

    // echo gettype($a)."<br>"."<br>";

    // echo (5 % 3)."\n"."<br>"."<br>";

    // define('MACONST','Hihi');
    // echo MACONST."<br>"."<br>";

    // const PI = 3.14;
    // echo PI."<br>"."<br>";

    // if(true){
    //     define('MACONST','Hello');
    // }else{
    //     define('MACONST','Hello world');
    // }
    // echo MACONST."<br>"."<br>";


    // $saisie = readline("saisir un nombre : ");
    // echo $saisie."\n"."<br>";
    // $saisie =$saisie +5;
    // echo $saisie."\n"."\n"."<br>"."<br>";


    // $age = 11;
    // if($age === 10){
    //     echo "age est egal à 10"."<br>"."<br>";
    // }else{
    //     echo "age n'est pas égal à 10"."<br>"."<br>";
    // }

  

    // $prenom = "robert";
    // switch($prenom):
    //     case "jean":
    //         echo "bonjour Jean";
    //         break;
    //     case "paul":
    //         echo "bonjour idiot";
    //         break;
    //     case "pierre":
    //         echo "bonjour babache";
    //         break;
    //     default:
    //         echo "non reconnu";
    //     endswitch;

    // $nom ="flouflou";

    // echo match($nom){
    //     "Dupont" => "bonjour Dupont",
    //     "Nerbert" => "bonjour Nerbert",
    //     default => "Nous ne te connaissons pas !!! Aïe, aïe, aïe ! "
    // };

    // $age = 10;
    // $isAllowed;
    // if($age > 10){
    //     $isAllowed = true;
    // }else{
    //     $isAllowed = false;
    // };

    // //equivalent

    // $isAllowed = $age > 10 ? true : false;

    $a = null;
    $b = "hello";
    $c;

    if($a){
        $c = $a;
    }elseif($b){
        $c = $b;
    }else{
        $c = "inconnu";
    }

    //equivalent
    $c = $a ?? $b ?? "inconnu";


    ?>

</body>
</html>