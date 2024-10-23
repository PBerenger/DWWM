<?php

namespace Application\Lib\Database;

class DatabaseConnection
{
    public ?\PDO $database = null;

    public function getConnection(): \PDO
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
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            // Défini le mode de récupération par défaut des résultats en tant que tableau associatif
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            // Désactive l'émulation des requêtes préparées (protection améliorée contre les injections SQL et meilleur performance)
            \PDO::ATTR_EMULATE_PREPARES => false,
        ];


        if ($this->database === null) {
            $this->database = new \PDO($dsn, $user, $password, $options);
        }

        return $this->database;
    }
}
