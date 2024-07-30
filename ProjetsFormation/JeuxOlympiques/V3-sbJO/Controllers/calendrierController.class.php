<?php
require_once './Models/calendrierManager.class.php';
require_once './Models/UserManager.class.php';

class CalendrierController
{
    private $calendrierManager;

    public function __construct()
    {
        $this->calendrierManager = new CalendrierManager();
    }

    public function listEvents()
    {
        if (!$this->isAdmin()) {
            header('Location: ' . URL . 'accueil'); // Redirection si pas administrateur
            exit;
        }

        $events = $this->calendrierManager->getEvents();
        require './views/calendrier.view.php';
    }

    private function isAdmin() {
        // Votre logique pour vérifier si l'utilisateur est administrateur
        return true; // Pour l'exemple, on suppose que l'utilisateur est administrateur
    }
}