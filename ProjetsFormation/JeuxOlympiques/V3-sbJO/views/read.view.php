<?php 
ob_start(); 
?>

<div class="readButtons">
    <a class="validButton" href="<?= URL ?>add">Ajouter un utilisateur</a>
    <a class="validButton" href="<?= URL ?>delete">Supprimer un utilisateur</a>
</div>

<h2 class="titrePage">Espace Administrateur</h2>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Image</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Email</th>
        <th>Date de Naissance</th>
        <th>Genre</th>
        <th>Téléphone</th>
        <th>Rôle</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($users as $user) : ?>
        <tr>
            <td><?= htmlspecialchars($user['id_user'], ENT_QUOTES, 'UTF-8'); ?></td>
            <td>
                <?php $imagePath = '../public/images/' . htmlspecialchars($user['image_name'] ?? 'default.jpg', ENT_QUOTES, 'UTF-8'); ?>
                <img src="<?= $imagePath; ?>" alt="Image de <?= htmlspecialchars($user['nom'] ?? 'Nom inconnu', ENT_QUOTES, 'UTF-8'); ?>" width="40">
            </td>
            <td><?= htmlspecialchars($user['userLastName'] ?? 'Nom inconnu', ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?= htmlspecialchars($user['userFirstName'] ?? 'Prénom inconnu', ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?= htmlspecialchars($user['userEmail'], ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?= htmlspecialchars($user['birthDay'] ?? 'Date de naissance inconnue', ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?= htmlspecialchars($user['userGender'], ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?= htmlspecialchars($user['UserPhone'] ?? 'Téléphone inconnu', ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?= htmlspecialchars($user['roleDescription'] ?? 'Rôle inconnu', ENT_QUOTES, 'UTF-8'); ?></td>
            <td><a href="<?= URL ?>update/<?= htmlspecialchars($user['id_user'], ENT_QUOTES, 'UTF-8'); ?>">Modifier</a></td>
        </tr>
    <?php endforeach; ?>
</table>

<?php
$content = ob_get_clean();
require "template.php";