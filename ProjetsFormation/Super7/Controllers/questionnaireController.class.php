<?php
require_once './Models/questionnaireManager.class.php';
require_once './Models/MyDbConnection.php';


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
        $error = null;

        if (isset($_POST['email'], $_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $userId = $this->authManager->authenticate($email, $password);

            if ($userId) {
                $_SESSION['users.id_user'] = $userId;
                header('Location: ' . URL . 'accueil');
                exit();
            } else {
                $error = "Email ou mot de passe incorrect.";
            }
        }

        require './views/login.view.php';
    }

    public function addQuestionnaires()
    {
        if (!$this->authManager->isUserLoggedIn()) {
            header("Location: " . URL . "login");
            exit();
        }

        $questionnaire = $this->questionnaireManager->getAllQuestionnnaires();
        require './views/questionnaire.view.php';
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
        
        // echo "<h1>Résultat du Questionnaire</h1>";
        // echo "<p>Votre principale catégorie est : " . $categories[$mainCategory] . "</p>";
    }
}
