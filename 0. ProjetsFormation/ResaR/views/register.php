<?php
$pageTitle = "Inscription Utilisateur- ResaR";
require_once './Managers/Connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupération des données du formulaire
    $firstName = htmlspecialchars($_POST['firstName']);
    $lastName = htmlspecialchars($_POST['lastName']);
    $email = htmlspecialchars($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // Préparation de la requête SQL pour insérer un nouvel utilisateur
    $stmt = $pdo->prepare('INSERT INTO users (firstName, lastName, email, password) VALUES (:firstName, :lastName, :email, :password)');
    $stmt->bindValue(':firstName', $firstName);
    $stmt->bindValue(':lastName', $lastName);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':password', $password);

    try {
        // Exécution de la requête
        $stmt->execute();
        echo "Inscription réussie !";
    } catch (PDOException $e) {
        // Gestion des erreurs
        echo "Erreur : " . $e->getMessage();
    }
}
?>

<!-- Formulaire HTML -->
<h2>S'inscrire :</h2>
<form method="POST">
    <input type="text" name="firstName" placeholder="Prénom" required>
    <input type="text" name="lastName" placeholder="Nom" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Mot de passe" required>
    <button type="submit">S'inscrire</button>
</form>
