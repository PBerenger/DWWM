<?php
session_start();
require 'auth.php';


// Récupération des données de l'utilisateur
$pdo = getPDOConnection();
// prépare une requette SQL pour la base de donnée
$stmt = $pdo->prepare('SELECT * from users');
// execute la requette
$stmt->execute();

// Requête SQL de mise à jour
$sql = "UPDATE utilisateurs SET nom=?, prenom=?, email=?, telephone=? WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssi", $nom, $prenom, $email, $telephone, $id);

// Exécution de la requête et gestion des erreurs
if ($stmt->execute()) {
    echo "Le compte utilisateur a été mis à jour avec succès.";
} else {
    echo "Erreur lors de la mise à jour du compte utilisateur: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>

<?php
$content = ob_get_clean();
$titre = 'Liste des utilisateurs';
require 'template.php';
?>