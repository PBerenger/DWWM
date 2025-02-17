<?php

namespace App\Controllers;

use App\Config\DbConnect;
use PDOException;

class RegisterUserAdmin
{
    public function execute(array $postData): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validation des données du formulaire
            $firstName = trim($postData['firstName'] ?? '');
            $lastName = trim($postData['lastName'] ?? '');
            $email = trim($postData['email'] ?? '');
            $password = $postData['password'] ?? '';

            if (empty($firstName) || empty($lastName) || empty($email) || empty($password)) {
                echo "Tous les champs sont obligatoires.";
                return;
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "Adresse email invalide.";
                return;
            }

            if (strlen($password) < 8) {
                echo "Le mot de passe doit contenir au moins 8 caractères.";
                return;
            }

            if ($password !== $postData['passwordRepeat']) {
                echo "Les mots de passe ne correspondent pas.";
                return;
            }            

            // Hachage du mot de passe
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            // Préparation de la requête SQL
            $pdo = DbConnect::getPDO();
            $stmt = $pdo->prepare('INSERT INTO users (firstName, lastName, email, password) VALUES (:firstName, :lastName, :email, :password)');
            $stmt->bindValue(':firstName', $firstName);
            $stmt->bindValue(':lastName', $lastName);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':password', $hashedPassword);

            try {
                // Exécution de la requête
                $stmt->execute();
                echo "Inscription réussie !";
            } catch (PDOException $e) {
                // Vérification si l'email est déjà utilisé
                if ($e->getCode() === '23000') { // Code d'erreur pour violation d'une contrainte d'unicité
                    echo "Cet email est déjà utilisé.";
                } else {
                    echo "Erreur lors de l'inscription : " . $e->getMessage();
                }
            }
        }
      
        // require __DIR__ . '/../Views/registerUserAdmin.php';
        // PAS BESOIN AVEC "header("Location: success.php");" dans registerUserAdmin_view.php ?
    }
}
