<?php
ob_start();
require_once("auth.php");
require 'functions.php';

// Créer une connexion

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifier si toutes les données nécessaires sont présentes
    if (isset($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['mdp'], $_POST['telephone'], $_POST['role'])) {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $mdp = $_POST['mdp'];
        $tel = $_POST['telephone'];
        $role = $_POST['role'];

        // Vérifier si l'email existe déjà dans la base de données
        $pdo = getPDOConnection(); // Assurez-vous d'avoir une fonction getPDOConnection() qui retourne l'objet PDO avec la connexion établie
        // Hasher le mot de passe (le crypter)
        $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
        
        $stmt = $pdo->prepare('SELECT email FROM users WHERE email = ?');
        $stmt->execute([$email]);
        $existingUser = $stmt->fetch();

        // Verifier si le mail existe déjà dans la BDD
        if ($existingUser) {
            phpAlert("Email déjà existant dans la base de données.");
        } else {
            // Insérer un nouvel utilisateur dans la table 'users'
            $stmt = $pdo->prepare('INSERT INTO users(nom, prenom, email, mdp, telephone) VALUES (?, ?, ?, ?, ?)');
            $stmt->execute([$nom, $prenom, $email, $mdp, $tel]);


            // Récupérer l'ID de l'utilisateur inséré
            $userId = $pdo->lastInsertId();

            // Insérer le rôle de l'utilisateur dans la table 'userroles'
            $stmt = $pdo->prepare('INSERT INTO userroles(user_id, role) VALUES (?, ?)');
            $stmt->execute([$userId, $role]);

            phpAlert("Utilisateur ajouté avec succès.");
        }
    } else {
        phpAlert("Tous les champs ne sont pas remplis.");
    }
} else {
    phpAlert("Méthode de requête incorrecte.");
}

?>


<div class="form-container">
    <form action="functions.php" method="POST">
        <label for="nom">Nom: </label>
        <input type="text" name="nom" required><br>

        <label for="prenom">Prénom: </label>
        <input type="text" name="prenom" required><br>

        <label for="email">Email: </label>
        <input type="email" name="email" required><br>

        <label for="mdp">Mot de passe :</label>
        <input type="password" name="mdp" required><br>

        <label for="telephone">Téléphone: </label>
        <input type="text" name="telephone" required><br>

        <label for="role">Rôle: </label>

        <select name="role" required>
            <option value="admin">Admin</option>
            <option value="non-admin">Non-Admin</option>
        </select><br>

        <input type="submit" value="Ajouter">
    </form>
</div>

<?php
$content = ob_get_clean();
$titre = "Créer utilisateur";
require "template.php";
?>