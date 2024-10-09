<?php
require_once __DIR__ . '../../Models/UserManager.class.php';
require_once __DIR__ . '../../Models/MyDbConnection.php';

if (isset($_SESSION['id_user'])) {
    $id_user = $_SESSION['id_user'];

    try {
        $pdo = MyDbConnection::getInstance();

        // Si l'utilisateur existe
        $checkUserQuery = "SELECT COUNT(*) FROM users WHERE id_user = :id_user";
        $checkStmt = $pdo->prepare($checkUserQuery);
        $checkStmt->execute([':id_user' => $id_user]);

        if ($checkStmt->fetchColumn() == 0) {
            echo "Utilisateur non trouvé.";
            exit;
        }

        // Récupération des réponses du formulaire
        function getPostValue($key, $default = 0)
        {
            return isset($_POST[$key]) && is_numeric($_POST[$key]) ? (int)$_POST[$key] : $default;
        }

        // Calcul des réponses
        $reponses = [
            'interpersonnelle' => getPostValue('question05') + getPostValue('question14') + getPostValue('question17') + getPostValue('question25') + getPostValue('question40') + getPostValue('question42') + getPostValue('question55') + getPostValue('question60') + getPostValue('question71') + getPostValue('question78'),
            'intrapersonnelle' => getPostValue('question04') + getPostValue('question15') + getPostValue('question24') + getPostValue('question27') + getPostValue('question34') + getPostValue('question45') + getPostValue('question50') + getPostValue('question59') + getPostValue('question70') + getPostValue('question73'),
            'spatiale' => getPostValue('question06') + getPostValue('question11') + getPostValue('question18') + getPostValue('question31') + getPostValue('question35') + getPostValue('question38') + getPostValue('question56') + getPostValue('question57') + getPostValue('question72') + getPostValue('question79'),
            'musicale' => getPostValue('question08') + getPostValue('question10') + getPostValue('question20') + getPostValue('question30') + getPostValue('question36') + getPostValue('question44') + getPostValue('question51') + getPostValue('question58') + getPostValue('question66') + getPostValue('question76'),
            'ecologique' => getPostValue('question01') + getPostValue('question13') + getPostValue('question21') + getPostValue('question26') + getPostValue('question37') + getPostValue('question47') + getPostValue('question54') + getPostValue('question61') + getPostValue('question67') + getPostValue('question75'),
            'kinesthesique' => getPostValue('question03') + getPostValue('question16') + getPostValue('question22') + getPostValue('question32') + getPostValue('question43') + getPostValue('question46') + getPostValue('question52') + getPostValue('question64') + getPostValue('question69') + getPostValue('question77'),
            'verbale' => getPostValue('question02') + getPostValue('question09') + getPostValue('question19') + getPostValue('question29') + getPostValue('question39') + getPostValue('question48') + getPostValue('question49') + getPostValue('question62') + getPostValue('question65') + getPostValue('question80'),
            'logique' => getPostValue('question07') + getPostValue('question12') + getPostValue('question23') + getPostValue('question28') + getPostValue('question33') + getPostValue('question41') + getPostValue('question53') + getPostValue('question63') + getPostValue('question68') + getPostValue('question74')
        ];

        // Détermination de l'intelligence dominante
        arsort($reponses);
        $dominante = key($reponses);
        $score_dominant = current($reponses);

        // Conversion du tableau en JSON pour l'enregistrer dans la base de données
        $reponses_json = json_encode($reponses);
        if ($reponses_json === false) {
            echo "Erreur lors de l'encodage JSON.";
            exit;
        }

        // Suppression des anciennes réponses si elles existent
        $deleteQuery = "DELETE FROM questionnaire WHERE id_user = :id_user";
        $deleteStmt = $pdo->prepare($deleteQuery);
        $deleteStmt->execute([':id_user' => $id_user]);

        // Envoi des nouvelles données dans la BDD
        $query = "INSERT INTO questionnaire (responses_questionnaire, id_user) VALUES (:responses, :id_user)";
        $stmt = $pdo->prepare($query);
        if ($stmt->execute([':responses' => $reponses_json, ':id_user' => $id_user])) {
            echo '<p class="recQuest">!!! Les réponses ont été enregistrées avec succès dans votre profil !!!</p>';
        } else {
            echo '<p class="recQuest">!!! Erreur lors de l\'enregistrement des réponses. Veuillez recommencer le questionnaire !!!</p>';
        }
    } catch (PDOException $e) {
        echo "Erreur de connexion ou d'exécution : " . $e->getMessage();
    }
} else {
    echo "Vous devez être connecté pour soumettre les réponses.";
}
