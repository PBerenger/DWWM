<?php
require_once './mydbConnection/Database.php';

session_start(); // Assurez-vous que l'utilisateur est connecté et est un admin

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $address = htmlspecialchars($_POST['address']);
    $phone = htmlspecialchars($_POST['phone']);
    $description = htmlspecialchars($_POST['description']);
    $location = htmlspecialchars($_POST['location']);
    $owner_id = $_SESSION['user_id']; // L'ID de l'utilisateur connecté

    $stmt = $pdo->prepare('INSERT INTO restaurants (owner_id, name, address, phone, description, location) VALUES (:owner_id, :name, :address, :phone, :description, :location)');
    $stmt->bindValue(':owner_id', $owner_id);
    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':address', $address);
    $stmt->bindValue(':phone', $phone);
    $stmt->bindValue(':description', $description);
    $stmt->bindValue(':location', $location);

    try {
        $stmt->execute();
        echo "Restaurant ajouté avec succès !";
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>
<!-- Formulaire HTML -->
<form method="POST">
    <input type="text" name="name" placeholder="Nom du restaurant" required>
    <input type="text" name="address" placeholder="Adresse" required>
    <input type="text" name="phone" placeholder="Téléphone">
    <textarea name="description" placeholder="Description"></textarea>
    <input type="text" name="location" placeholder="Localisation">
    <button type="submit">Ajouter</button>
</form>

<?php
$content = ob_get_clean();
// require_once __DIR__ . "/template.php";
?>