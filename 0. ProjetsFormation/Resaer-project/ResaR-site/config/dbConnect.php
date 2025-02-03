<?php

namespace App\Config;

// use PDO;
// use PDOException;

abstract class DbConnect
{
    private static ?\PDO $pdo = null;

    public static function getPDO(): \PDO
    {
        if (self::$pdo === null) {
            //     $settings = parse_ini_file("settings.ini", true);
            //     $databaseSettings = $settings["database"];

            //     $host = getenv('DB_HOST') ?: 'localhost';
            //     $port = getenv('DB_PORT') ?: '3306';
            //     $db = getenv('DB_NAME') ?: 'resar_bdd';
            //     $user = getenv('DB_USER') ?: 'root';
            //     $pass = getenv('DB_PASS') ?: '';
            //     $charset = 'utf8mb4';

            //     $dsn = "mysql:host=$host;port=$port;dbname=$db;charset=$charset";
            //     $options = [
            //         \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            //         \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            //         \PDO::ATTR_EMULATE_PREPARES => false,
            //     ];

            //     try {
            //         self::$pdo = new \PDO($dsn, $user, $pass, $options);
            //     } catch (\PDOException $e) {
            //         error_log('Erreur de connexion : ' . $e->getMessage());
            //         throw new \PDOException("Erreur de connexion à la base de données.");
            //     }
            // }

            $settings = parse_ini_file("settings.ini", true);
            $databaseSettings = $settings["database"];

            $driver = $databaseSettings["driver"];
            $hostname = $databaseSettings["host"];
            $port = $databaseSettings["port"];
            $dbName = $databaseSettings["dbname"];
            $charset = $databaseSettings["charset"];
            $username = $databaseSettings["user"];
            $password = $databaseSettings["password"];
            $options = [
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                \PDO::ATTR_EMULATE_PREPARES => false,
            ];

            self::$pdo = new \PDO("$driver:host=$hostname;port=$port;dbname=$dbName;charset=$charset", $username, $password, $options);
        }
        return self::$pdo;
    }

    public static function closeConnection(): void
    {
        self::$pdo = null;
    }
}
