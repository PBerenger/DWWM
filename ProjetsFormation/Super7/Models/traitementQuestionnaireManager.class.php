<?php
// vérifier si les require sont utiles
require_once __DIR__ . '/MyDbConnection.php';
require_once __DIR__ . '../../Controllers/traitementQuestionnaireController.class.php';
require_once __DIR__ . '../../views/traitementQuestionnaire.view.php';


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Récupérer les données envoyées par le formulaire
    $responses_questionnaire = $_POST['responses_questionnaire'];
    $id_user = $_SESSION['user_id']; // Assurez-vous que l'utilisateur est connecté

    
    // Requête d'insertion dans la table questionnaire
    $sql =
    "INSERT INTO 
            questionnaire (
                responses_questionnaire, 
                id_user
            ) 
        VALUES 
        (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $responses_questionnaire, $id_user);
    $stmt->execute();
    
    // Redirection après l'enregistrement
    header("Location: thank_you.php");
    exit;
}

// class TraitementResponsesManager
// {
//     private $pdo;

//     public function __construct()
//     {
//         $this->pdo = MyDbConnection::getInstance();
//     }
//     public function getAllResponses()
//     {
//         $sql = '
//                 SELECT questionnaire_id, responses_questionnaire, id_user
//                 FROM questionnaire
//             ';
//         $stmt = $this->pdo->prepare($sql);

//         if ($stmt->execute()) {
//             return $stmt->fetchAll(PDO::FETCH_ASSOC);
//         } else {
//             // Gérer l'erreur ici si nécessaire
//             echo 'erreur du chargement du questionnaire (1)';
//             return [];
//         }
//     }
// }