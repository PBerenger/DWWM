<?php
require_once __DIR__ . '/../Models/ProfilManager.class.php';

class ProfilController {
    private $profilManager;

    public function __construct() {
        $this->profilManager = new ProfilManager();
    }

    public function afficherProfil($userId) {
        // Récupérer les informations de l'utilisateur (à compléter)
        $utilisateur = $this->profilManager->getUserInfo($userId);
        
        // Récupérer les réponses du questionnaire
        $responses = $this->profilManager->getResponsesByUserId($userId);
        
        // Retourner les données à la vue
        return [
            'utilisateur' => $utilisateur,
            'responses' => $responses
        ];
    }
}

