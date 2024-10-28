<?php
class ProfilManager {
    private $pdo;

    public function __construct() {
        $this->pdo = MyDbConnection::getInstance();
    }

    // Récupérer les informations de l'utilisateur
    public function getUserInfo($userId) {
        $stmt = $this->pdo->prepare('SELECT * FROM users WHERE id_user = :userId');
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Récupérer les réponses du questionnaire pour un utilisateur
    public function getResponsesByUserId($userId) {
        $stmt = $this->pdo->prepare('SELECT responses_questionnaire FROM questionnaire WHERE id_user = :userId');
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        // Vérifiez si le résultat n'est pas false avant d'accéder à l'indice
        if ($result !== false && isset($result['responses_questionnaire'])) {
            return json_decode($result['responses_questionnaire'], true);
        }
    
        // Retourner un tableau vide ou null si aucune réponse n'est trouvée
        return null; // ou return []; selon votre préférence
    }    
}
