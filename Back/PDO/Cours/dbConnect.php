<?php

// Le serveur local du pc
$host = '127.0.0.1';
$port = '3306';
$dataBase = 'employes'; 
$user = 'root';
$pwd = '';
$charset = 'utf8mb4';

$dataSourceName = "mysql:host=$host;port=$port;dbname=$dataBase;charset=$charset";

$option=[
    // Mets une exception quand il y a une erreur
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    // Retourne sous forme de tableau associatif
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    //  Sécurité acrue (surtout contre les injections SQL)
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $pdo = new PDO($dataSourceName, $user, $pwd, $option);
    echo 'Connection établie à la base de données';
} catch (PDOException $e) {
    echo ''. $e->getMessage(),(int)$e->getCode() .'';

}

$reponse = $pdo->query("SELECT * FROM employe");
foreach ($reponse as $row) {
    echo"". $row["nom"] ."". $row["prenom"];
}

?>