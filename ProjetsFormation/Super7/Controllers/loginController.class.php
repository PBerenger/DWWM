<?php
require_once __DIR__ . '../../Models/AuthManager.class.php';
require_once __DIR__ . '../../Models/MyDbConnection.php';

class LoginController {
    private $authManager;

    public function __construct() {
        $this->authManager = new AuthManager();
        $this->authManager->startSession();
    }

    public function login() {
        $error = null;

        if (isset($_POST['u_email'], $_POST['u_password'])) {
            $email = $_POST['u_email'];
            $password = $_POST['u_password'];

            $userId = $this->authManager->authenticate($email, $password);

            if ($userId) {
                $_SESSION['id_user'] = $userId;
                header('Location: ' . URL . 'accueil');
                exit();
            } else {
                $error = "Email ou mot de passe incorrect.";
            }
        }

        require_once __DIR__ . '../../views/login.view.php';
    }
}
