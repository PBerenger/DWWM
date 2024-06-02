Dans POWERSHELL

Pour renvoyer le fichier
- php 'nomFichier'.php
Pour lancer le server en local
- php -S localhost:8080
- puis CTRL+clic sur le lien "http://"

!!!
php cherche toujours la page index.php par défaut
pour changer de nom de fichier, par exemple : "hello.php"; rajouter au http://
=> http://localhost:8080/hello.php


LES VARIABLES :
pour lancer une variable (comme JS) : $'joueur' = "chaineDeCaracteres"


RACCOURCIS :
- ."\n" : passer ligne dans le terminal
- ."<'br'>" : passer ligne dans la commande pour le html
- $a = "helloworld"; : string
- $b = 1; : int
- $c = 3.14; : float=double
- $d = true; : boolean (en "true" affiche le 1, en "false" n'affiche rien par défaut)
- echo gettype($a); : affiche le type


OPPERATIONS : (php operator : https://www.php.net/manual/fr/language.operators.php)
calculs
- echo (5 % 3)."\n"; // affiche 2  
- echo (5 % -3)."\n"; // affiche 2  
- echo (-5 % 3)."\n"; // affiche -2  
- echo (-5 % -3)."\n"; // affiche -2

logiques (https://www.php.net/manual/fr/language.operators.logical.php)
$a and $b
And (Et)
[true] si $a ET $b valent **`[true]

$a or $b
Or (Ou)|
[true] si $a OU $b valent **`[true]

$a xor $b
XOR|**`[true]
[true] si $a OU $b est [true] mais pas les deux en même temps.

|! $a
Not (Non)
[true] si $a n'est pas **`[true]

$a && $b
And (Et)
[true] si $a ET $b sont **`[true]

$a \| $b
Or (Ou)|
[true] si $a OU $b est [true]

===>>> PRIORITES : https://www.php.net/manual/fr/language.operators.precedence.php


CONSTANTE :
impossible de modifier une constante
- define('NOMCONSTANTE', 'chaineDeCaracteres') : true de fonctionne qu'avec ça
```php
if(true){
        define('MACONST','Hello');
    }else{
        define('MACONST','Hello world');
    }
    echo MACONST;
```

- const NOMCONSTANTE = "chaine" ou chiffre


SAISIES :
`$'saisie' = readline("saisir un nombre : ");`

IF et ELSE :
```php
    $nom ="flouflou";

    echo match($nom){
        "Dupont" => "bonjour Dupont",
        "Nerbert" => "bonjour Nerbert",
        default => "Nous ne te connaissons pas !!! Aïe, aïe, aïe ! "
    };
```

```php
 $prenom = "robert";

     switch($prenom):
         case "jean":
             echo "bonjour Jean";
             break;
         case "paul":
             echo "bonjour idiot";
             break;
         case "pierre":
             echo "bonjour babache";
             break;
         default:
             echo "non reconnu";
         endswitch;
```

```php
    $age = 11;
    if($age === 10){
        echo "age est egal à 10";
    }else{
        echo "age n'est pas égal à 10";
    }
```

Ternaire (pour un seul "if, else"):
```php
	    $age = 10;
    $isAllowed;
    if($age > 10){
        $isAllowed = true;
    }else{
        $isAllowed = false;
    };
  
    //equivalent

    $isAllowed = $age > 10 ? true : false;
```
? : pour une condition


Fusion Null :

```php
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
```
?? : pour vérifier si une variable existe

Demande :
```php
	$saisie = readline("saisir un nombre : ");
    echo $saisie;
    
   // ajoute un nombre
    $saisie =$saisie +5;
    echo $saisie;
```

