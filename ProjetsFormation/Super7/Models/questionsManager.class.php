<?php
require_once './Models/MyDbConnection.php';

class QuestionsManager
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = MyDbConnection::getInstance();
    }

    public function getQuestions()
    {
        $sql = '
                SELECT questionnaire_id, responses_questionnaire
                FROM questionnaire
                ORDER BY questionnaire_id
            ';
        $stmt = $this->pdo->prepare($sql);
        
        if ($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            // Gérer l'erreur ici si nécessaire
            return [];
        }
    }
}

