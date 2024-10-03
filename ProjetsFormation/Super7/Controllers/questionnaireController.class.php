<?php
require_once __DIR__ . '../../Models/questionnaireManager.class.php';
require_once __DIR__ . '../../Models/MyDbConnection.php';


class questionnaireController
{
    private $questionnaireManager;
    private $authManager;

    public function __construct()
    {
        $this->questionnaireManager = new questionnaireManager();
        $this->authManager = new AuthManager();
    }

    public function login()
    {
        if (isset($_POST['u_email'], $_POST['u_password'])) {
            $email = $_POST['u_email'];
            $password = $_POST['u_password'];

            $userId = $this->authManager->authenticate($email, $password);

            if ($userId) {
                $_SESSION['id_user'] = $userId;
                header('Location: ' . URL . 'accueil');
                exit();
            } else {
                $error = "Email ou mot de passe incorrect.";
            }
        }

        require_once __DIR__ . '../../views/login.view.php';
    }

    public function addQuestionnaires()
    {
        if (!$this->authManager->isUserLoggedIn()) {
            header("Location: " . URL . "login");
            exit();
        }

        $questionnaire = $this->questionnaireManager->getAllQuestionnnaires();
        require_once __DIR__ . '../../views/questionnaire.view.php';
    }

    public function resultQuestionnaire()
    {
        $categories = [
            0 => 'NULL',
            1 => 'Interpersonnelle',
            2 => 'Intrapersonnelle',
            3 => 'Spatiale',
            4 => 'Musicale',
            5 => 'Ecologique',
            6 => 'Kinesthésique',
            7 => 'Verbale',
            8 => 'Logique'
        ];
        
        $scores = array_fill(0, 9, 0);
        
        foreach ($_POST as $key => $value) {
            if (is_numeric($value)) {
                $category = (int)$value;
                if (isset($scores[$category])) {
                    $scores[$category]++;
                }
            }
        }
        
        $maxScore = max($scores);
        $mainCategory = array_search($maxScore, $scores);
    }
}
