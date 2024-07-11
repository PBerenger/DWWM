
### Requêtes Préparées

Les **requêtes préparées** sont un mécanisme utilisé pour exécuter des requêtes SQL de manière sécurisée et efficace. Elles permettent de séparer le code SQL des données, réduisant ainsi les risques d'injection SQL et améliorant les performances pour des requêtes répétitives. Voici les principales étapes et avantages des requêtes préparées :

#### Étapes des Requêtes Préparées :

1. **Préparation** : La requête SQL est envoyée au serveur avec des paramètres placeholders (comme `?` ou `:param`) au lieu de valeurs réelles.
2. **Exécution** : Les valeurs réelles sont envoyées et liées aux paramètres placeholders, puis la requête est exécutée.

#### Avantages :

- **Sécurité** : Les requêtes préparées protègent contre les attaques par injection SQL, car les données sont traitées séparément du code SQL.
- **Performances** : Pour des requêtes répétitives, le serveur peut analyser et optimiser la requête une seule fois, puis l'exécuter plusieurs fois avec différents paramètres.

#### Exemple en PHP avec PDO :

```php
<?php
// Connexion à la base de données
$dsn = 'mysql:host=localhost;dbname=ma_base_de_donnees';
$username = 'mon_utilisateur';
$password = 'mon_mot_de_passe';
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
];

try {
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
    exit;
}

// Préparation de la requête
$sql = 'SELECT * FROM utilisateurs WHERE email = :email';
$stmt = $pdo->prepare($sql);

// Liaison des paramètres et exécution
$email = 'exemple@example.com';
$stmt->bindParam(':email', $email);
$stmt->execute();

// Récupération des résultats
$resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);
print_r($resultats);
?>
```

### Procédures Stockées

Les **procédures stockées** sont des ensembles de commandes SQL pré-compilées et stockées dans la base de données. Elles peuvent inclure des requêtes SQL, des instructions de contrôle de flux, des déclarations de variables, et bien plus. Les procédures stockées sont utiles pour encapsuler la logique de la base de données et améliorer les performances.

#### Avantages :

- **Réduction du trafic réseau** : Les applications peuvent envoyer une seule commande pour exécuter une procédure complexe plutôt que d'envoyer plusieurs requêtes SQL séparées.
- **Encapsulation de la logique métier** : La logique complexe peut être centralisée dans la base de données.
- **Sécurité et gestion des accès** : Les droits d'accès peuvent être gérés au niveau des procédures stockées, limitant ainsi l'exposition des tables sous-jacentes.

#### Exemple en MySQL :

```php
DELIMITER //

CREATE PROCEDURE ObtenirUtilisateursParEmail(IN email VARCHAR(255))
BEGIN
    SELECT * FROM utilisateurs WHERE email = email;
END //

DELIMITER ;
```

#### Appel d'une procédure stockée en PHP :

```php
<?php
// Connexion à la base de données
$dsn = 'mysql:host=localhost;dbname=ma_base_de_donnees';
$username = 'mon_utilisateur';
$password = 'mon_mot_de_passe';
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
];

try {
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
    exit;
}

// Appel de la procédure stockée
$email = 'exemple@example.com';
$stmt = $pdo->prepare('CALL ObtenirUtilisateursParEmail(:email)');
$stmt->bindParam(':email', $email);
$stmt->execute();

// Récupération des résultats
$resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);
print_r($resultats);
?>
```

### Différences Clés

- **Requêtes Préparées** :
    
    - Principalement utilisées pour des requêtes dynamiques répétitives.
    - Offrent une protection contre les injections SQL.
    - Utilisées dans le code de l'application.
- **Procédures Stockées** :
    
    - Encapsulent une logique SQL complexe dans la base de données.
    - Peuvent inclure des opérations SQL multiples et une logique de contrôle de flux.
    - Offrent des avantages en termes de performance et de sécurité en centralisant la logique métier.

Les deux techniques améliorent la sécurité et les performances, mais elles sont utilisées dans des contextes légèrement différents selon les besoins de l'application.

4o