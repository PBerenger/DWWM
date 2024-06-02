- **Les chaînes de caractères (`string`)** : c'est le nom informatique qu'on donne au texte. 
    
- **Les nombres entiers (`int`)** : ce sont les nombres du type 1, 2, 3, 4, etc. On compte aussi parmi eux les entiers relatifs : -1, -2, -3…
    
- **Les nombres décimaux (`float` )** : ce sont les nombres à virgule, comme 14,738. Attention, les nombres doivent être écrits avec un point au lieu de la virgule (c'est la notation anglaise).
    
- **Les booléens (`bool` )** : c'est un type très important qui permet de stocker soit vrai soit faux. 
    
- **Rien (`NULL` )** : aussi bizarre que cela puisse paraître, on a parfois besoin de dire qu'une variable ne contient rien. Ce n'est pas vraiment un type de données, mais plutôt **l'absence** de type

### Concaténez une variable
La concaténation est un moyen d'assembler du texte et des variables.

### Interpolation avec des guillemets doubles
L'interpolation en PHP vous permet d'inclure directement des variables dans une chaîne de caractères sans avoir à les concaténer séparément, ce qui rend votre code plus lisible et concis.

```php
<?php
    $fullname = "Mathieu Nebra";
    echo "Bonjour {$fullname} et bienvenue sur le site !";
?>
```

### Les calculs

```php
<?php
$number = 2 + 4; // $number prend la valeur 6
$number = 5 - 1; // $number prend la valeur 4
$number = 3 * 5; // $number prend la valeur 15
$number = 10 / 2; // $number prend la valeur 5

// Allez on rajoute un peu de difficulté
$number = 3 * 5 + 1; // $number prend la valeur 16
$number = (1 + 2) * 2; // $number prend la valeur 6
?>
```

```php
<?php
$number = 10;
$result = ($number + 5) * $number; // $result prend la valeur 150
?>
```

### Le Modulo
Il est possible de faire un autre type d'opération un peu moins connu : le **modulo**. Cela représente le reste de la division entière.

Par exemple, 6 / 3 = 2 et il n'y a pas de reste. En revanche, 7 / 3 = 2 (car le nombre 3 « rentre » 2 fois dans le nombre 7) et il reste 1. Vous avez fait ce type de calculs à l'école primaire, souvenez-vous !

Le modulo permet justement de récupérer ce reste :

```php
<?php
$number = 10 % 5; // $number prend la valeur 0 car la division tombe juste
$number = 10 % 3; // $number prend la valeur 1 car il reste 1
?>
```

### Autres calculs

- la racine carrée ;
- l'exponentielle ;
- la factorielle ;
- etc.

