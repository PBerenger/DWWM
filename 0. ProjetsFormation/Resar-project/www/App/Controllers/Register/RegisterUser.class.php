<?php

namespace App\Controllers\Register;

use App\Config\DbConnect;
// use App\Models\{User, Restaurant};
use \PDOException;

class RegisterUser
{
    public function execute(array $postdata)
    {
        $validationError = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $prenom = trim($postdata['prenom']);
            $nom = trim($postdata['nom']);
            $email = trim($postdata['email']);
            $password = $postdata['password'];
            $passwordRepeat = $postdata['passwordRepeat'];

            // Vérification que tous les champs sont remplis
            if (empty($prenom) || empty($nom) || empty($email) || empty($password) || empty($passwordRepeat)) {
                $validationError = "Tous les champs doivent être remplis.";
            }
            // Vérification du mot de passe avec regex
            elseif (!preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[$@!%*#?&])[A-Za-z\d$@!%*#?&]{8,}$/", $password)) {
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
            } else {
                $pdo = DbConnect::getPDO();

                // Vérifier si l'email existe déjà
                $stmt = $pdo->prepare("SELECT idUsers FROM users WHERE email = ?");
                $stmt->execute([$email]);

                if ($stmt->fetch()) {
                    $validationError = "L'email est déjà utilisé.";
                } else {
                    try {
                        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
                        $stmt = $pdo->prepare("INSERT INTO users (firstName, lastName, email, password) VALUES (?, ?, ?, ?)");
                        $stmt->execute([$prenom, $nom, $email, $hashedPassword]);

                        // $_SESSION['success_message'] = $validationSuccess;
                        header("Location: ?page=success");
                    } catch (PDOException $e) {
                        die("Erreur SQL : " . $e->getMessage());
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
}
