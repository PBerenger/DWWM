<?php
require_once __DIR__ . "/MyDbConnection.php";
class AuthManager {
    private $pdo;

    public function __construct() {
        $this->pdo = MyDbConnection::getInstance();
    }

    public function startSession() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }
    
    public function authenticate($email, $password) {
        $stmt = $this->pdo->prepare('SELECT id_user, u_password FROM users WHERE u_email = ?');
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['u_password'])) {
            return $user['id_user'];
        } else {
            return false;
        }
    }

    public function estAdmin($userId) {
        $stmt = $this->pdo->prepare(
            'SELECT 
                        role_description 
                    FROM 
                        user_roles 
                    WHERE 
                        id_role = ?');
        $stmt->execute([$userId]);
        $userRole = $stmt->fetch();
        return $userRole && $userRole['role_description'] === 'admin';
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
        return isset($_SESSION['id_user']);
    }
    
    public function logout() {
        $this->startSession();
        session_unset();
        session_destroy();
    }
}
