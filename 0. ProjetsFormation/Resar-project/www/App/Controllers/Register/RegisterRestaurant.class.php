<?php

namespace App\Controllers\Register;

use App\Config\DbConnect;
use PDOException;

class RegisterRestaurant
{
    public function execute(array $postData, array $filesData)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $validationError = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Vérification des clés requises
            $requiredKeys = ['prenom', 'nom', 'email', 'telephone', 'password', 'passwordRepeat'];
            foreach ($requiredKeys as $key) {
                if (!isset($postData[$key])) {
                    $_SESSION['error_message'] = "Données invalides reçues.";
                    header("Location: ?page=error");
                    exit;
                }
            }

            if (!isset($filesData['photoProfil'], $filesData['photoRestaurant'])) {
                $_SESSION['error_message'] = "Les images sont requises.";
                header("Location: ?page=error");
                exit;
            }

            // Nettoyage des entrées utilisateur
            $prenom = trim($postData['prenom']);
            $nom = trim($postData['nom']);
            $email = trim($postData['email']);
            $telephone = trim($postData['telephone']);
            $password = $postData['password'];
            $passwordRepeat = $postData['passwordRepeat'];
            $photoProfil = $filesData['photoProfil'];
            $photoRestaurant = $filesData['photoRestaurant'];

            // Vérifications des champs obligatoires
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
                }
            }

            // Gestion des images si aucune erreur de validation précédente
            if (empty($validationError)) {
                $uploadDir = __DIR__ . '/../../uploads/';
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                // Types MIME acceptés et taille maximale
                $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
                $maxFileSize = 2 * 1024 * 1024; // 2 Mo

                if (!in_array($photoProfil['type'], $allowedTypes) || !in_array($photoRestaurant['type'], $allowedTypes)) {
                    $validationError = "Seuls les fichiers JPG, PNG et GIF sont autorisés.";
                } elseif ($photoProfil['size'] > $maxFileSize || $photoRestaurant['size'] > $maxFileSize) {
                    $validationError = "La taille de chaque image ne doit pas dépasser 2 Mo.";
                }

                if (empty($validationError)) {
                    $photoProfilPath = $uploadDir . basename($photoProfil['name']);
                    $photoRestaurantPath = $uploadDir . basename($photoRestaurant['name']);

                    if (!move_uploaded_file($photoProfil['tmp_name'], $photoProfilPath)) {
                        $validationError = "Erreur lors du téléchargement de la photo de profil.";
                    } elseif (!move_uploaded_file($photoRestaurant['tmp_name'], $photoRestaurantPath)) {
                        unlink($photoProfilPath); // Supprime la première image si la seconde échoue
                        $validationError = "Erreur lors du téléchargement de la photo du restaurant.";
                    }
                }
            }

            // Insertion dans la base de données si tout est correct
            if (empty($validationError)) {
                try {
                    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
                    $stmt = $pdo->prepare("INSERT INTO users (firstName, lastName, email, phone, password, role, photoProfil, photoRestaurant) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
                    $stmt->execute([$prenom, $nom, $email, $telephone, $hashedPassword, 'restaurateur', basename($photoProfil['name']), basename($photoRestaurant['name'])]);

                    $_SESSION['success_message'] = "Inscription réussie. Vous pouvez maintenant vous connecter.";
                    header("Location: ?page=success");
                    exit;
                } catch (PDOException $e) {
                    // Afficher l'erreur SQL uniquement en mode développement
                    if ($_ENV['APP_ENV'] === 'dev') {
                        $validationError = "Erreur SQL : " . $e->getMessage();
                    } else {
                        $validationError = "Une erreur s'est produite lors de l'inscription.";
                    }
                }
            }

            // Redirection en cas d'erreur
            if (!empty($validationError)) {
                $_SESSION['error_message'] = $validationError;
                header("Location: ?page=error");
                exit;
            }
        }
    }
}
