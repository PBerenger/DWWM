<?php

namespace App\Controllers;

use App\Config\DbConnect;
use App\Models\User;

require_once "../lib/helperFunctions.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class RegisterUser
{
    public function execute(array $postData)
    {

        // echo var_dump($postData);

        if (isset($postData["lastName"], $postData["firstName"], $postData["email"], $postData["password"], $postData["passwordRepeat"])) {

            $pdo = DbConnect::getPDO();
            extract($postData, EXTR_SKIP);

            $email = filter_var($email, FILTER_VALIDATE_EMAIL);

            $inputsOk = true;
            $_SESSION["errorInscription"] = [];
            $nameCheck = "/^[\p{L}\p{Pd}]+([\ \p{L}\p{Pd}]*)$/u";

            // Verify user inputs 
            if (preg_match($nameCheck, $lastName) !== 1) {
                $_SESSION["errorInscription"]["lastName"] = "Le nom contient des caractères invalides";
                $inputsOk = false;
            } else if (preg_match($nameCheck, $firstName) !== 1) {
                $_SESSION["errorInscription"]["firstName"] = "Le prénom contient des caractères invalides";
                $inputsOk = false;
            }

            if (!$email) {
                $_SESSION["errorInscription"]["email"] = "L'email est invalide";
                $inputsOk = false;
            } else if ((new User($pdo))->findUserByEmail($email) !== null) {
                $_SESSION["errorInscription"]["email"] = "L'email est déjà utilisé";
                $inputsOk = false;
            }

            // Regex pour voir si le mot de passe respecte les critères de sécurité 
            $password = trim($password);
            if (!preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[$@!%*#?&]).{8,}$/", $password)) {
                $_SESSION["errorInscription"]["password"] = "Le mot de passe ne respecte pas les critères de sécurité";
                $inputsOk = false;
            } else if (strcmp($password, $passwordRepeat)) {
                $_SESSION["errorInscription"]["password"] = "Les mots de passe ne sont pas identiques";
                $inputsOk = false;
            }

            $fullName = "$lastName $firstName";

            $success = false;
            if ($inputsOk) {
                $success = User::create($pdo, $firstName, $lastName, $email, $password);
            }

            if ($success) {
                $_SESSION["successMessage"] = "La création du compte à réussi";
                header("Location: success");
                exit;
            } else {
                $_SESSION["errorMessage"] = "L'inscription a échouée";
            }
        }

        require __DIR__ . "/../Views/registerUser_view.php";

    }
}
