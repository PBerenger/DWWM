### Explication de l'Encapsulation

L'encapsulation est un principe fondamental de la Programmation Orientée Objet (POO) qui consiste à regrouper les données (attributs) et les méthodes (fonctions) qui manipulent ces données dans une seule unité, appelée classe. L'encapsulation permet de contrôler l'accès aux données de l'objet, en protégeant ainsi les données contre les modifications non intentionnelles et en cachant les détails internes de l'implémentation.

Il y a trois niveaux de visibilité pour les attributs et les méthodes dans la plupart des langages orientés objet :

1. **Public** : Les membres (attributs ou méthodes) déclarés publics peuvent être accessibles depuis n'importe où.
2. **Protected** : Les membres déclarés protégés ne sont accessibles que depuis la classe elle-même et les classes dérivées.
3. **Private** : Les membres déclarés privés ne sont accessibles que depuis la classe elle-même.

L'encapsulation permet de définir des interfaces publiques pour interagir avec l'objet tout en cachant les détails de l'implémentation.

### Exemple en PHP

Voici un exemple illustrant l'encapsulation en PHP :

```php
<?php
class CompteBancaire {
    private $solde;

    public function __construct($soldeInitial) {
        $this->solde = $soldeInitial;
    }

    // Méthode pour déposer de l'argent
    public function deposer($montant) {
        if ($montant > 0) {
            $this->solde += $montant;
        }
    }

    // Méthode pour retirer de l'argent
    public function retirer($montant) {
        if ($montant > 0 && $montant <= $this->solde) {
            $this->solde -= $montant;
        } else {
            echo "Montant de retrait invalide.\n";
        }
    }

    // Méthode pour obtenir le solde
    public function obtenirSolde() {
        return $this->solde;
    }
}

// Création d'un objet CompteBancaire
$compte = new CompteBancaire(1000);

// Déposer de l'argent
$compte->deposer(500);
echo "Solde après dépôt: " . $compte->obtenirSolde() . "\n";  // 1500

// Retirer de l'argent
$compte->retirer(200);
echo "Solde après retrait: " . $compte->obtenirSolde() . "\n";  // 1300

// Tentative de retrait d'un montant invalide
$compte->retirer(2000);  // Montant de retrait invalide.
echo "Solde final: " . $compte->obtenirSolde() . "\n";  // 1300
?>

```


### Explication de l'exemple

1. **Classe `CompteBancaire`** :
    
    - L'attribut `$solde` est déclaré privé, ce qui signifie qu'il n'est accessible qu'à l'intérieur de la classe.
    - Le constructeur initialise le solde du compte.
    - La méthode `deposer` permet d'ajouter de l'argent au solde, en vérifiant que le montant est positif.
    - La méthode `retirer` permet de retirer de l'argent du solde, en vérifiant que le montant est positif et ne dépasse pas le solde actuel. Si le montant est invalide, un message d'erreur est affiché.
    - La méthode `obtenirSolde` retourne le solde actuel.
2. **Utilisation de l'objet `CompteBancaire`** :
    
    - Un nouvel objet `CompteBancaire` est créé avec un solde initial de 1000.
    - L'argent est déposé et retiré en utilisant les méthodes `deposer` et `retirer`.
    - Le solde est obtenu et affiché en utilisant la méthode `obtenirSolde`.

Ce mécanisme de contrôle d'accès protège le solde du compte contre les modifications directes et non autorisées, assurant ainsi l'intégrité des données.

4o

ChatGPT peut faire des erreurs. Envisagez de vérifier les informations importantes.