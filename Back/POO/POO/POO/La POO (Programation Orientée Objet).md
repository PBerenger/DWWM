
lien aide : https://grafikart.fr/formations/programmation-objet-php


VOCABULAIRE :

La Programmation Orientée Objet (POO) est un paradigme de programmation qui utilise des "objets" pour concevoir et construire des applications. Voici les concepts clés de la POO :

1. **Objet** : Une instance d'une classe, qui peut contenir des données (sous forme d'attributs ou de propriétés) et des méthodes (fonctions ou procédures).
    
2. **Classe** : Un modèle ou un plan pour créer des objets. Elle définit les attributs et les méthodes que les objets créés à partir de cette classe posséderont.
    
3. **Encapsulation** : Le concept de regrouper des données et des méthodes qui manipulent ces données dans une seule unité (classe), tout en cachant les détails internes de l'implémentation. Cela signifie que les attributs d'un objet ne peuvent être modifiés directement, mais seulement via des méthodes.
    
4. **Héritage** : Un mécanisme qui permet de créer une nouvelle classe à partir d'une classe existante. La nouvelle classe (sous-classe) hérite des attributs et des méthodes de la classe existante (super-classe), ce qui favorise la réutilisation du code.
    
5. **Polymorphisme** : La capacité des objets à être traités comme des instances de leur super-classe plutôt que de leur classe réelle. Cela permet d'utiliser une interface commune pour des classes différentes.
    
6. **Abstraction** : Le processus de simplification complexe en se concentrant sur les aspects les plus importants, tout en masquant les détails moins pertinents. En POO, cela se traduit souvent par la définition de classes et d'interfaces abstraites.

### Définition d'Attribut et de Fonction

#### Attribut

Un **attribut** (ou propriété, ou champ) est une variable qui appartient à une classe ou à un objet. Les attributs sont utilisés pour stocker des données spécifiques à l'objet.

- **Attribut de classe** : Un attribut qui appartient à la classe elle-même et est partagé par toutes les instances de la classe.
- **Attribut d'instance** : Un attribut qui appartient à une instance spécifique de la classe. Chaque instance a ses propres valeurs pour ces attributs.

Par exemple, dans une classe `Voiture`, les attributs pourraient inclure `couleur`, `marque`, et `vitesse`.

#### Fonction

Une **fonction** (ou méthode, dans le contexte de la POO) est un bloc de code qui effectue une tâche spécifique et peut être appelée à partir d'un objet ou d'une classe. Les fonctions peuvent manipuler les attributs de la classe et effectuer des opérations liées à l'objet.

- **Méthode de classe** : Une fonction qui appartient à la classe et peut être appelée sur la classe elle-même.
- **Méthode d'instance** : Une fonction qui appartient à une instance de la classe et peut être appelée sur cette instance spécifique.

Par exemple, dans la classe `Voiture`, une méthode pourrait être `demarrer()` ou `accelerer()`.

### Exemple en PHP

Voici un exemple simple montrant des attributs et des fonctions (méthodes) dans une classe PHP :

```php*
<?php
class Voiture {
    // Attributs d'instance
    private $couleur;
    private $marque;
    private $vitesse;

    // Constructeur pour initialiser les attributs
    public function __construct($couleur, $marque) {
        $this->couleur = $couleur;
        $this->marque = $marque;
        $this->vitesse = 0;  // Vitesse initiale
    }

    // Méthode pour démarrer la voiture
    public function demarrer() {
        echo "La voiture démarre\n";
        $this->vitesse = 10;  // Vitesse initiale après démarrage
    }

    // Méthode pour accélérer la voiture
    public function accelerer($increment) {
        $this->vitesse += $increment;
        echo "La voiture accélère à " . $this->vitesse . " km/h\n";
    }

    // Méthode pour obtenir la vitesse actuelle
    public function obtenirVitesse() {
        return $this->vitesse;
    }
}

// Création d'un objet Voiture
$maVoiture = new Voiture("Rouge", "Toyota");

// Utilisation des méthodes de l'objet
$maVoiture->demarrer();  // La voiture démarre
$maVoiture->accelerer(20);  // La voiture accélère à 30 km/h
echo "Vitesse actuelle: " . $maVoiture->obtenirVitesse() . " km/h\n";  // Vitesse actuelle: 30 km/h
?>
```

### Explication de l'exemple

1. **Attributs d'instance** :
    
    - `$couleur`, `$marque`, et `$vitesse` sont des attributs d'instance qui stockent les données spécifiques à chaque objet `Voiture`.
2. **Méthodes d'instance** :
    
    - `__construct($couleur, $marque)` est le constructeur qui initialise les attributs `couleur` et `marque` et met la vitesse initiale à 0.
    - `demarrer()` est une méthode qui démarre la voiture et met la vitesse à 10 km/h.
    - `accelerer($increment)` est une méthode qui augmente la vitesse de la voiture.
    - `obtenirVitesse()` est une méthode qui retourne la vitesse actuelle de la voiture.

Ces éléments permettent de manipuler les attributs de l'objet et d'effectuer des opérations spécifiques, illustrant comment les attributs et les méthodes travaillent ensemble pour définir le comportement des objets en POO.


### Définition d'Instance

Une **instance** en Programmation Orientée Objet (POO) est un objet créé à partir d'une classe. La classe sert de modèle ou de plan pour l'objet, et une instance est une manifestation concrète de ce modèle, avec ses propres valeurs pour les attributs définis par la classe.

### Explication

- **Classe** : C'est une définition ou un modèle qui décrit les attributs et les méthodes que les objets de ce type auront. Par exemple, une classe `Voiture` pourrait avoir des attributs comme `couleur` et `marque` et des méthodes comme `demarrer()` et `accelerer()`.
    
- **Instance** : C'est un objet spécifique créé à partir d'une classe. Si `maVoiture` est une instance de la classe `Voiture`, alors `maVoiture` est un objet qui a ses propres valeurs pour `couleur` et `marque` et peut utiliser les méthodes définies dans la classe `Voiture`.
    

### Exemple en PHP

```php
<?php
// Définition de la classe
class Voiture {
    // Attributs
    public $couleur;
    public $marque;

    // Constructeur pour initialiser les attributs
    public function __construct($couleur, $marque) {
        $this->couleur = $couleur;
        $this->marque = $marque;
    }

    // Méthode pour démarrer la voiture
    public function demarrer() {
        echo "La voiture démarre\n";
    }

    // Méthode pour accélérer la voiture
    public function accelerer() {
        echo "La voiture accélère\n";
    }
}

// Création d'instances de la classe Voiture
$maVoiture = new Voiture("Rouge", "Toyota");
$taVoiture = new Voiture("Bleue", "Ford");

// Utilisation des méthodes et affichage des attributs des instances
$maVoiture->demarrer();  // La voiture démarre
echo "Ma voiture est de couleur " . $maVoiture->couleur . " et de marque " . $maVoiture->marque . ".\n";  // Ma voiture est de couleur Rouge et de marque Toyota.

$taVoiture->accelerer();  // La voiture accélère
echo "Ta voiture est de couleur " . $taVoiture->couleur . " et de marque " . $taVoiture->marque . ".\n";  // Ta voiture est de couleur Bleue et de marque Ford.
?>
```

### Explication de l'exemple

1. **Définition de la classe `Voiture`** :
    
    - La classe `Voiture` a deux attributs : `couleur` et `marque`.
    - Le constructeur `__construct` initialise ces attributs lorsque l'instance est créée.
    - La classe a deux méthodes : `demarrer` et `accelerer`.
2. **Création d'instances** :
    
    - `$maVoiture` et `$taVoiture` sont des instances de la classe `Voiture`. Chaque instance a ses propres valeurs pour `couleur` et `marque`.
    - `$maVoiture` est une voiture rouge de marque Toyota.
    - `$taVoiture` est une voiture bleue de marque Ford.
3. **Utilisation des méthodes et affichage des attributs** :
    
    - Les méthodes `demarrer` et `accelerer` sont appelées sur les instances respectives.
    - Les attributs `couleur` et `marque` des instances sont affichés, montrant les valeurs spécifiques de chaque instance.

### Résumé

Une instance est une réalisation concrète d'une classe, possédant ses propres données et capable d'exécuter les méthodes définies dans la classe. Chaque instance a ses propres valeurs pour les attributs et peut interagir avec les autres objets et l'environnement en utilisant ses méthodes.




AVANTAGED :

- **Réutilisabilité** : Grâce à l'héritage, il est facile de réutiliser du code existant.
- **Modularité** : Les objets peuvent être modifiés indépendamment, ce qui facilite la maintenance et les mises à jour.
- **Facilité de maintenance** : L'encapsulation aide à protéger l'intégrité des données et à limiter les effets secondaires.
- **Souplesse et évolutivité** : Le polymorphisme et l'abstraction permettent de créer des systèmes flexibles et extensibles.

Exemple :

```php
	<?php
// Classe de base
class Animal {
    protected $nom;

    public function __construct($nom) {
        $this->nom = $nom;
    }

    // Méthode abstraite (sera implémentée dans les sous-classes)
    public function parler() {
        // Méthode vide dans la classe de base
    }
}

// Classe dérivée Chien
class Chien extends Animal {
    public function parler() {
        return "Woof!";
    }
}

// Classe dérivée Chat
class Chat extends Animal {
    public function parler() {
        return "Meow!";
    }
}

// Création des objets
$chien = new Chien("Rex");
$chat = new Chat("Whiskers");

// Affichage des noms et des sons des animaux
echo $chien->nom . "\n";  // Rex
echo $chien->parler() . "\n";  // Woof!
echo $chat->nom . "\n";  // Whiskers
echo $chat->parler() . "\n";  // Meow!
?>
```

### Explication :

1. **Classe de base `Animal`** :
    
    - La classe `Animal` a un attribut protégé `$nom` et un constructeur pour initialiser cet attribut.
    - La méthode `parler` est définie mais vide, elle sera redéfinie dans les sous-classes.
2. **Classe dérivée `Chien`** :
    
    - La classe `Chien` hérite de `Animal` et redéfinit la méthode `parler` pour retourner "Woof!".
3. **Classe dérivée `Chat`** :
    
    - La classe `Chat` hérite de `Animal` et redéfinit la méthode `parler` pour retourner "Meow!".
4. **Création des objets et utilisation** :
    
    - Des instances des classes `Chien` et `Chat` sont créées avec des noms respectifs.
    - Les noms et les sons produits par ces objets sont affichés à l'aide des méthodes et attributs définis.

Cet exemple illustre les concepts de base de la Programmation Orientée Objet en PHP, tels que l'héritage, la redéfinition de méthodes et l'encapsulation des données.