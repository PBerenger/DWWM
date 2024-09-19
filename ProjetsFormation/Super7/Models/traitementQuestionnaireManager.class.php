<?php
require_once './Models/MyDbConnection.php';

class TraitementResponsesManager
{
    private $pdo;
    
    public function __construct()
    {
        $this->pdo = MyDbConnection::getInstance();
    }
    public function getAllResponses()
    {
        $sql = '
                SELECT questionnaire_id, responses_questionnaire, id_user
                FROM questionnaire
            ';
        $stmt = $this->pdo->prepare($sql);

        if ($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            // Gérer l'erreur ici si nécessaire
            echo 'erreur du chargement du questionnaire (1)';
            return [];
        }
    }
}