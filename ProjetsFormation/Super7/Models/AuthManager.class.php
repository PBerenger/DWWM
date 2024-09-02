<?php
require_once "MyDbConnection.php";
class AuthManager {
    private $pdo;

    public function __construct() {
        $this->pdo = MyDbConnection::getInstance();
    }

    public function startSession() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function authenticate($email, $password) {
        $stmt = $this->pdo->prepare('SELECT id_user, userPassword FROM users WHERE userEmail = ?');
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['userPassword'])) {
            return $user['id_user'];
        } else {
            return false;
        }
    }

    public function estAdmin($userId) {
        $stmt = $this->pdo->prepare('SELECT role FROM UserRoles WHERE role_id = ?');
        $stmt->execute([$userId]);
        $userRole = $stmt->fetch();
        return $userRole && $userRole['role'] === 'admin';
    }

    public function verifierAdmin() {
        $this->startSession();
        if (!isset($_SESSION['role_id'])) {
            echo "Session utilisateur non définie.";
            exit();
        } else {
            $userId = $_SESSION['role_id'];
            if (!$this->estAdmin($userId)) {
                echo "L'utilisateur avec l'ID $userId n'est pas un administrateur.";
                exit();
            }
        }
    }

    public function isUserLoggedIn() {
        return isset($_SESSION['user_id']);
    }
    
    public function logout() {
        $this->startSession();
        session_unset();
        session_destroy();
    }
}
