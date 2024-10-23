<?php
require_once './Models/classementManager.class.php';
require_once './Models/UserManager.class.php';

class ClassementController
{
    private $classementManager;

    public function __construct()
    {
        $this->classementManager = new ClassementManager();
    }

    public function listClassement()
    {
        if (!$this->isAdmin()) {
            header('Location: ' . URL . 'accueil'); // Redirection si pas administrateur
            exit;
        }

        $classement = $this->classementManager->getClassement();
        require './views/classement.view.php';
    }

    private function isAdmin() {
        // Votre logique pour vérifier si l'utilisateur est administrateur
        return true; // Pour l'exemple, on suppose que l'utilisateur est administrateur
    }
}