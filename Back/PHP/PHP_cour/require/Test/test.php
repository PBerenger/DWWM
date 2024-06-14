<?php
$host = "127.0.0.1";
$port = "3306";
$db = "repertoire";
$user = "root";
$password = "";
$charset = "utf8mb4";


// Data source name
$dsn = "mysql:host=$host;port=$port;dbname=$db;charset=$charset";

$options = [
    // Défini le mode de gestion des erreurs en ERRMODE_EXCEPTION (lance une exception en cas d'erreurs)
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    // Défini le mode de récupération par défaut des résultats en tant que tableau associatif
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    // Désactive l'émulation des requêtes préparées (protection améliorée contre les injections SQL et meilleur performance)
    PDO::ATTR_EMULATE_PREPARES => false,
];

// Gestion des erreurs
try {
    $pdo = new PDO($dsn, $user, $password, $options);
    echo "Connexion réussie à la base de données";
} catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode()); // ???
}

echo "<br />";

// $mysqli = mysqli_connect('localhost', 'root', '', 'mysql',"3306");
// $result = mysqli_query($pdo, "SELECT * FROM employe");
$result = $pdo->query('SELECT * FROM users JOIN userroles ON users.id = userroles.user_id WHERE role="admin"');
echo "Voici les admins : <br />";
foreach ($result as $row) {
    echo "<li>";
    echo "Nom : ". $row["nom"] ."<br />Prenom : ". $row["prenom"] . "<br />Email : ". $row["email"] . "<br />Téléphone : " . $row["telephone"] . "<br />";
    echo "</li>";
}