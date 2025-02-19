<?php

namespace App\Controllers\Register;

use App\Config\DbConnect;
use PDOException;

class RegisterUser
{
    public function execute(array $postData)
    {
        session_start();
        $validationError = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $prenom = trim($_POST['prenom']);
            $nom = trim($_POST['nom']);
            $email = trim($_POST['email']);
            $password = $_POST['password'];
            $passwordRepeat = $_POST['passwordRepeat'];

            // Vérification que tous les champs sont remplis
            if (empty($prenom) || empty($nom) || empty($email) || empty($password) || empty($passwordRepeat)) {
                $validationError = "Tous les champs doivent être remplis.";
            } 
            // Vérification du mot de passe avec regex
            elseif (!preg_match("/^((?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9])(?=\S*?[$@!%*#?&]).{8,})\S$/", $password)) {
                $validationError = "Le mot de passe doit contenir au moins :
                                    - 8 caractères
                                    - Une majuscule
                                    - Une minuscule
                                    - Un chiffre
                                    - Un caractère spécial parmi $@!%*#?&.";
            } 
            // Vérification de la correspondance des mots de passe
            elseif ($password !== $passwordRepeat) {
                $validationError = "Les mots de passe ne correspondent pas.";
            } 
            else {
                $pdo = DbConnect::getPDO();
                $stmt = $pdo->prepare("SELECT idUsers FROM users WHERE email = ?");
                $stmt->execute([$email]);

                if ($stmt->fetch()) {
                    $validationError = "L'email est déjà utilisé.";
                } else {
                    try {
                        // Hachage du mot de passe avant l'insertion
                        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
                        $stmt = $pdo->prepare("INSERT INTO users (firstName, lastName, email, password, role) VALUES (?, ?, ?, ?, ?)");
                        $stmt->execute([$prenom, $nom, $email, $hashedPassword, 'user']);

                        $_SESSION['success_message'] = "Inscription réussie. Vous pouvez maintenant vous connecter.";
                        header("Location: ?page=success");
                        exit;
                    } catch (PDOException $e) {
                        $validationError = "Une erreur s'est produite lors de l'inscription.";
                    }
                }
            }
        }

        if (!empty($validationError)) {
            $_SESSION['error_message'] = $validationError;
            header("Location: ?page=error");
            exit;
        }
    }
}