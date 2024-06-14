<?php
session_start();
require 'auth.php';
require 'functions.php';

// Récupération des données de l'utilisateur
$pdo = getPDOConnection();

// Vérifier si le formulaire de mise à jour est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update'])) {
        // Récupérer les données du formulaire de mise à jour
        $id = $_POST['id'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $telephone = $_POST['telephone'];

        // Requête SQL de mise à jour
        $sql = "UPDATE users SET nom=?, prenom=?, email=?, telephone=? WHERE id=?";
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute([$nom, $prenom, $email, $telephone, $id])) {
            phpAlert("Le compte utilisateur a été mis à jour avec succès.");
        } else {
            phpAlert("Erreur lors de la mise à jour du compte utilisateur: " . $stmt->errorInfo()[2]);
        }
    } elseif (isset($_POST['delete'])) {
        // Récupérer l'ID de l'utilisateur à supprimer
        $id = $_POST['id'];

        // Requête SQL de suppression
        $sql = "DELETE FROM users WHERE id=?";
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute([$id])) {
            phpAlert("Le compte utilisateur a été supprimé avec succès.");
        } else {
            phpAlert("Erreur lors de la suppression du compte utilisateur: " . $stmt->errorInfo()[2]);
        }
    }
}

// Prépare une requête SQL pour la base de données et récupère les utilisateurs
$stmt = $pdo->prepare('SELECT * FROM users');
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php
ob_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Liste des utilisateurs</title>
</head>
<body>
    <table>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Téléphone</th>
            <th>Action</th>
        </tr>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?php echo htmlspecialchars($user['id']); ?></td>
            <td><?php echo htmlspecialchars($user['nom']); ?></td>
            <td><?php echo htmlspecialchars($user['prenom']); ?></td>
            <td><?php echo htmlspecialchars($user['email']); ?></td>
            <td><?php echo htmlspecialchars($user['telephone']); ?></td>
            <td>
                <form method="POST" action="">
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($user['id']); ?>">
                    <input type="text" name="nom" value="<?php echo htmlspecialchars($user['nom']); ?>">
                    <input type="text" name="prenom" value="<?php echo htmlspecialchars($user['prenom']); ?>">
                    <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>">
                    <input type="text" name="telephone" value="<?php echo htmlspecialchars($user['telephone']); ?>">
                    <button type="submit" name="update">Mettre à jour</button>
                    <button type="submit" name="delete" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">Supprimer</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
<?php
$content = ob_get_clean();
$titre = 'Liste des utilisateurs';
require 'template.php';
?>
