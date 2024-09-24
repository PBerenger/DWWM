<?php
require_once __DIR__ . '../../Models/AuthManager.class.php';
require_once __DIR__ . '../../Models/MyDbConnection.php';

class LoginController
{
    private $authManager;

    public function __construct()
    {
        $this->authManager = new AuthManager();
        $this->authManager->startSession();
    }

    public function login()
    {
        if (isset($_POST['u_email'], $_POST['u_password'])) {
            // Validation/sanitation des entrées
            $email = filter_var($_POST['u_email'], FILTER_SANITIZE_EMAIL);
            $password = $_POST['u_password'];
            echo $email;

            // Authentification via authManager
            $userId = $this->authManager->authenticate($email, $password);

            if ($userId) {
                $_SESSION['id_user'] = $userId;
                $_SESSION['success_message'] = "Vous êtes connecté avec succès.";
                header('Location: ' . URL . 'accueil');
                exit();
            } else {
                $_SESSION['error_message'] = "Email ou mot de passe incorrect.";
                header('Location: ' . URL . 'login');
                exit();
            }
        }
        require_once __DIR__ . '../../views/login.view.php';
    }
}
