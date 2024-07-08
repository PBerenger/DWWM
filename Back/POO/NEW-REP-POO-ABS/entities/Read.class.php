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
require_once 'Auth.class.php';
require_once  'User.class.php';

Auth::verifyAdmin();

$users = User::getAllUsersWithRoles();
?>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Email</th>
        <th>Téléphone</th>
        <th>Rôle</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($users as $user): ?>
    <tr>
        <td><?php echo htmlspecialchars($user['id']); ?></td>
        <td><?php echo htmlspecialchars($user['nom']); ?></td>
        <td><?php echo htmlspecialchars($user['prenom']); ?></td>
        <td><?php echo htmlspecialchars($user['email']); ?></td>
        <td><?php echo htmlspecialchars($user['telephone']); ?></td>
        <td><?php echo htmlspecialchars($user['role']); ?></td>
        <td><a href="Update.class.php?id=<?php echo $user['id']; ?>">Modifier</a></td>
    </tr>
    <?php endforeach; ?>
</table>

<?php
$content = ob_get_clean();
$titre = "Voir les utilisateurs";
require __DIR__ . "/../public/template.php";
?>
