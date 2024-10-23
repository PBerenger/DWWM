<?php
require_once './Models/athleteManager.class.php';
require_once './Models/UserManager.class.php';

class AthletesController
{
    private $athleteManager;

    public function __construct()
    {
        $this->athleteManager = new AthletesManager();
    }

    public function listAthletes()
    {
        if (!$this->isAdmin()) {
            header('Location: ' . URL . 'accueil'); // Redirection si pas administrateur
            exit;
        }

        $athletes = $this->athleteManager->getAllAthletes();
        require './views/athletes.view.php';
    }

    private function isAdmin() {
        // Vérifier si l'utilisateur est administrateur
        return true;
    }
}
