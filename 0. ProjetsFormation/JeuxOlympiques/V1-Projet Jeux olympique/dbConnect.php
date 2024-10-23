<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function getPDOConnection()
{
    $host = "127.0.0.1";
    $port = "3306";
    $db = "jo_skateboard";
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
        return new PDO($dsn, $user, $password, $options);
    } catch (PDOException $e) {
        throw new PDOException($e->getMessage(), (int)$e->getCode());
    }
}

