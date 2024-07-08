<?php
// Démarrer la sortie HTML
header("Content-Type: text/html; charset=UTF-8");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page avec CSS</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
</body>
</html>

<?php
ob_start();
require_once __DIR__ . '/../entities/Auth.class.php';
require_once __DIR__ . '/../entities/User.class.php';
Auth::verifyAdmin();

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $message = User::deleteUser($id);
    echo $message;
}

$users = User::getAllUsers();
?>

<form class="form-container" method="POST">
    <label for="id">Utilisateur:</label>
    <select name="id" required>
        <?php foreach ($users as $user) : ?>
            <option value="<?php echo htmlspecialchars($user['id']); ?>">
                <?php echo htmlspecialchars($user['prenom'] . ' ' . $user['nom']); ?>
            </option>
        <?php endforeach; ?>
    </select>
    <input type="submit" value="Supprimer">
</form>

<?php
$content = ob_get_clean();
$titre = "Supprimer un utilisateur";
require __DIR__ . "/../public/template.php";
?>
