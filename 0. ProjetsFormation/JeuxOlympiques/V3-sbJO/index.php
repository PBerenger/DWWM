<?php
// Définit la constante URL
define("URL", str_replace("index.php", "", (isset($_SERVER["HTTPS"]) ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']));
// echo var_dump($_SESSION);
// Inclure les fichiers de contrôleurs nécessaires
//USERS
require_once './Controllers/UserController.class.php';
require_once './Controllers/LoginController.class.php';
require_once './Controllers/LogoutController.class.php';
require_once './Models/AuthManager.class.php';
$authManager = new AuthManager();
//ATHLETES
require_once './Controllers/calendrierController.class.php';
require_once './Controllers/classementController.class.php';
require_once './Controllers/athleteController.class.php';
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
            case "calendrier":
                $controller = new CalendrierController();
                $controller->listEvents();
                break;
            case "classement":
                $controller = new classementController();
                $controller->listClassement();
                break;
            case "athletes":
                $controller = new AthletesController();
                $controller->listAthletes();
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
                        // Gérer le cas où aucun utilisateur n'a été sélectionné
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
            default:
                throw new Exception("La page n'existe pas");
        }
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
