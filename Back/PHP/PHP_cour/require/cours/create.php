<?php
ob_start();
require_once("auth.php");

// Créer une connexion


// vérifier si ça existe
if (isset($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['telephone'], $_POST['role'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $tel = $_POST['telephone'];
    $role = $_POST['role'];

// permettre d'acceder à la base de donnée
    $pdo = getPDOConnection();
// prépare une requette SQL pour la base de donnée
    $stmt = $pdo->prepare('INSERT INTO users(nom, prenom, email, telephone) VALUE(?,?,?,?)');
// execute la requette
    $stmt->execute([$nom, $prenom, $email, $tel]);

// renvoie l'ID de la derniere ligne ajoutée
    $userId = $pdo->lastInsertId();

// prépare une requette SQL pour la base de donnée
    $stmt = $pdo->prepare('INSERT INTO userroles(user_id, role) VALUES (?,?)');
// execute la requette
    $stmt->execute([$userId,$role]);

    echo "ajouté avec succès";
}else{
    echo "tous les champs ne sont pas remplis";
}

?>


<div class="form-container">
    <form method="POST">
        <label for="nom">Nom:</label>
        <input type="text" name="nom" required><br>

        <label for="prenom">Prénom:</label>
        <input type="text" name="prenom" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="telephone">Téléphone:</label>
        <input type="text" name="telephone" required><br>

        <label for="role">Rôle:</label>

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