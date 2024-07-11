<?php
if (session_status() == PHP_SESSION_NONE) session_start();

require_once __DIR__ . '/../lib/database.php';

// Importer le namespace
use Application\Lib\Database\DatabaseConnection;

function estAdmin($userId) {
    try {
        $pdo = (new DatabaseConnection())->getConnection();
        if (!$pdo) {
            throw new Exception('Impossible de se connecter à la base de données.');
        }

        // Préparation de la requête SQL
        $stmt = $pdo->prepare('SELECT role FROM jo_skateboard WHERE user_id = ?');
        if (!$stmt) {
            throw new Exception('La préparation de la requête a échoué.');
        }

        // Exécution de la requête
        $stmt->execute([$userId]);
        // Récupération du résultat
        $userRoles = $stmt->fetch();

        // Vérification du rôle    
        return $userRoles && $userRoles['role'] === 'admin';
    } catch (Exception $e) {
        // Loggez l'erreur ou affichez un message d'erreur approprié
        error_log($e->getMessage());
        return false;
    }
}

function verifAdmin() {
    if (!isset($_SESSION['user_id'])) {
        echo 'Session non définie.';
        exit();
    } else {
        $userId = $_SESSION['user_id'];
        if (!estAdmin($userId)) {
            echo "L'utilisateur " . htmlspecialchars($userId, ENT_QUOTES, 'UTF-8') . " n'est pas administrateur";
            exit();
        }
    }
}
