<?php
$pageTitle = "Inscription Restaurant - ResaR";
require_once './Managers/Connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupération des données du formulaire
    $name = htmlspecialchars($_POST['name']);
    $address = htmlspecialchars($_POST['address']);
    $phone = htmlspecialchars($_POST['phone']);
    $description = htmlspecialchars($_POST['description']);
    $location = htmlspecialchars($_POST['location']);
    $ownerId = $_SESSION['user_id']; // Supposons que l'utilisateur connecté soit stocké dans la session

    // Préparation de la requête SQL pour insérer un nouveau restaurant
    $stmt = $pdo->prepare('INSERT INTO restaurants (owner_id, name, address, phone, description, location) VALUES (:owner_id, :name, :address, :phone, :description, :location)');
    $stmt->bindValue(':owner_id', $ownerId);
    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':address', $address);
    $stmt->bindValue(':phone', $phone);
    $stmt->bindValue(':description', $description);
    $stmt->bindValue(':location', $location);

    try {
        // Exécution de la requête
        $stmt->execute();
        echo "Inscription du restaurant réussie !";
    } catch (PDOException $e) {
        // Gestion des erreurs
        echo "Erreur : " . $e->getMessage();
    }
}
?>

<!-- Formulaire HTML -->
<h2>Inscrire un restaurant :</h2>
<form method="POST">
    <input type="text" name="name" placeholder="Nom du restaurant" required>
    <input type="text" name="address" placeholder="Adresse" required>
    <input type="text" name="phone" placeholder="Téléphone">
    <textarea name="description" placeholder="Description du restaurant"></textarea>
    <input type="text" name="location" placeholder="Localisation (ex: Paris, France)">
    <button type="submit">Enregistrer</button>
</form>