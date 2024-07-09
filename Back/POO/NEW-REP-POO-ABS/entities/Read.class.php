    <?php
    ob_start();
    require_once 'Auth.class.php';
    require_once 'User.class.php';

    // Vérifier si l'utilisateur est un administrateur
    Auth::verifyAdmin();

    // Récupérer tous les utilisateurs avec leurs rôles
    $users = User::getAllUsersWithRoles();
    ?>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Téléphone</th>
            <th>Rôle</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($users as $user) : ?>
            <tr>
                <td><?= htmlspecialchars($user['id']); ?></td>
                <td>
                    <img src="../public/img/<?= htmlspecialchars($user['image_name']); ?>" alt="Image de <?php echo htmlspecialchars($user['nom']); ?>" style="width:100px;height:auto;">
                </td>
                <td><?= htmlspecialchars($user['nom']); ?></td>
                <td><?= htmlspecialchars($user['prenom']); ?></td>
                <td><?= htmlspecialchars($user['email']); ?></td>
                <td><?= htmlspecialchars($user['telephone']); ?></td>
                <td><?= htmlspecialchars($user['role']); ?></td>
                <td><a href="Update.class.php?id=<?= htmlspecialchars($user['id']); ?>">Modifier</a></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <?php
    $content = ob_get_clean();
    $titre = "Voir les utilisateurs";
    require __DIR__ . "/../public/template.php";
    ?>