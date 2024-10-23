<?php
// Définit la constante URL
define("URL", str_replace("index.php", "", (isset($_SERVER["HTTPS"]) ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']));
// echo var_dump($_SESSION);

require_once __DIR__ . '/Controllers/UserController.class.php';
require_once __DIR__ . '/Controllers/LoginController.class.php';
require_once __DIR__ . '/Controllers/LogoutController.class.php';
require_once __DIR__ . '/Controllers/questionnaireController.class.php';
require_once __DIR__ . '/Models/AuthManager.class.php';
$authManager = new AuthManager();

$authManager->startSession();

try {
    if (empty($_GET["page"])) {
        header("Location: " . URL . "accueil");
        exit();
    } else {
        $url = explode("/", filter_var($_GET["page"], FILTER_SANITIZE_URL));
        switch ($url[0]) {
            case "accueil":
                require "views/accueil.view.php";
                break;

            case "informations":
                require "views/informations.view.php";
                break;

            case "games":
                require "views/games.view.php";
                break;

            case "login":
                $controller = new LoginController();
                $controller->login();
                break;

            case "logout":
                $controller = new LogoutController();
                $controller->logout();
                break;

            case "read":
                $controller = new UserController();
                $controller->listUsers();
                break;

            case "update":
                $controller = new UserController();
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $controller->updateUser($_POST, $_FILES);
                } else {
                    if (isset($url[1])) {
                        $controller->UpdateForm($url[1]);
                    } else {
                        throw new Exception("ID utilisateur non spécifié");
                    }
                }
                break;

            case "delete":
                $controller = new UserController();
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    if (isset($_POST['ids'])) {
                        $controller->deleteUsers($_POST['ids']);
                    } else {
                        $controller->listUsers();
                    }
                } else {
                    $controller->deleteForm();
                }
                break;

            case "add":
                $controller = new UserController();
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $controller->addUser($_POST, $_FILES);
                } else {
                    $controller->addForm();
                }
                break;

            case "profil":
                $controller = new UserController();
                if (isset($_SESSION['id_user'])) {
                    $controller->profilDisplay($_SESSION['id_user']);
                } else {
                    throw new Exception("Vous devez être connecté pour accéder à cette page.");
                }
                break;

            case "questionnaire":
                $controller = new questionnaireController();
                if (!$authManager->isUserLoggedIn()) {
                    // Rediriger vers la page de login s'il n'est pas connecté
                    header("Location: " . URL . "login");
                    exit();
                }
                $controller->addQuestionnaires();
                break;

            case "traitementQuestionnaire":
                require 'views/traitementQuestionnaire.view.php';
                break;

            default:
                throw new Exception("La page n'existe pas");
        }
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
