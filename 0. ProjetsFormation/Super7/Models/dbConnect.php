<?php
abstract class DbConnect {
    private static $instance = null;
    protected $pdo;

    protected function __construct() {
        $host = getenv('DB_HOST') ?: 'localhost';
        $port = getenv('DB_PORT') ?: '3306';
        $db = getenv('DB_NAME') ?: 'super7_main_bdd';
        $user = getenv('DB_USER') ?: 'root';
        $pass = getenv('DB_PASS') ?: '';
        $charset = 'utf8mb4';
        
        $dsn = "mysql:host=$host;port=$port;dbname=$db;charset=$charset";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        try {
            $this->pdo = new PDO($dsn, $user, $pass, $options);
        } catch (PDOException $e) {
            error_log('Erreur de connexion : ' . $e->getMessage());
            die('Une erreur est survenue lors de la connexion à la base de données.');
        }
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new static();
        }
        return self::$instance->pdo;
    }

    public static function closeConnection() {
        self::$instance = null;
    }
}
