<?php

namespace App\Controllers\Register;

use App\Config\DbConnect;
use PDOException;

class RegisterOwner
{
    public function execute(array $postData, array $filesData)
    {
        session_start();
        $validationError = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $prenom = trim($postData['prenom']);
            $nom = trim($postData['nom']);
            $email = trim($postData['email']);
            $telephone = trim($postData['telephone']);
            $password = $postData['password'];
            $passwordRepeat = $postData['passwordRepeat'];
            $photoProfil = $filesData['photoProfil'];
            $photoRestaurant = $filesData['photoRestaurant'];

            // Vérification des champs obligatoires
            if (empty($prenom) || empty($nom) || empty($email) || empty($telephone) || empty($password) || empty($passwordRepeat)) {
                $validationError = "Tous les champs doivent être remplis.";
            }
            // Vérification du format du téléphone
            elseif (!preg_match("/^[0-9]{10}$/", $telephone)) {
                $validationError = "Le numéro de téléphone doit contenir 10 chiffres.";
            }
            // Vérification du mot de passe
            elseif (!preg_match("/^((?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9])(?=\S*?[$@!%*#?&]).{8,})\S$/", $password)) {
                $validationError = "Le mot de passe doit contenir au moins :\n- 8 caractères\n- Une majuscule\n- Une minuscule\n- Un chiffre\n- Un caractère spécial parmi $@!%*#?&.";
            }
            // Vérification de la correspondance des mots de passe
            elseif ($password !== $passwordRepeat) {
                $validationError = "Les mots de passe ne correspondent pas.";
            } else {
                $pdo = DbConnect::getPDO();
                $stmt = $pdo->prepare("SELECT idUsers FROM users WHERE email = ?");
                $stmt->execute([$email]);

                if ($stmt->fetch()) {
                    $validationError = "L'email est déjà utilisé.";
                } else {
                    // Gestion des images
                    $uploadDir = __DIR__ . '/../../uploads/';
                    if (!is_dir($uploadDir)) {
                        mkdir($uploadDir, 0777, true);
                    }

                    $photoProfilPath = $uploadDir . basename($photoProfil['name']);
                    $photoRestaurantPath = $uploadDir . basename($photoRestaurant['name']);

                    if (!move_uploaded_file($photoProfil['tmp_name'], $photoProfilPath) || !move_uploaded_file($photoRestaurant['tmp_name'], $photoRestaurantPath)) {
                        $validationError = "Erreur lors du téléchargement des images.";
                    } else {
                        try {
                            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
                            $stmt = $pdo->prepare("INSERT INTO users (firstName, lastName, email, phone, password, role, photoProfil, photoRestaurant) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
                            $stmt->execute([$prenom, $nom, $email, $telephone, $hashedPassword, 'restaurateur', basename($photoProfil['name']), basename($photoRestaurant['name'])]);

                            $_SESSION['success_message'] = "Inscription réussie. Vous pouvez maintenant vous connecter.";
                            header("Location: ?page=success");
                            exit;
                        } catch (PDOException $e) {
                            $validationError = "Une erreur s'est produite lors de l'inscription.";
                        }
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
