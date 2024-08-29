<?php

abstract class DbConnect {
    private static $instance = null;
    protected $pdo;

    protected function __construct() {
        $host = getenv('DB_HOST') ?: 'localhost';
        $port = getenv('DB_PORT') ?: '3306';
        $db = getenv('DB_NAME') ?: 'essai_questionnaire';
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
            error_log($e->getMessage());
            die('Erreur de connexion à la base de données : ' . $e->getMessage());

        }
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new static();
        }
        return self::$instance->pdo;
    }
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $q1 = isset($_POST['q1']) ? (int)$_POST['q1'] : 0;
    $q2 = isset($_POST['q2']) ? (int)$_POST['q2'] : 0;
    $q3 = isset($_POST['q3']) ? (int)$_POST['q3'] : 0;

    $score = $q1 + $q2 + $q3;

    echo "<h1>Résultat du questionnaire</h1>";

    if ($score >= 13) {
        echo "<p>Votre score est $score. Vous êtes une personne extravertie et sociable.</p>";
    } elseif ($score >= 8) {
        echo "<p>Votre score est $score. Vous avez un équilibre entre introversion et extraversion.</p>";
    } else {
        echo "<p>Votre score est $score. Vous êtes plutôt introverti.</p>";
    }
} else {
    echo "Veuillez remplir le questionnaire.";
}