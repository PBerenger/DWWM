<?php
ob_start();
?>

<div class="readButtons">
    <a class="validButton" href="<?= URL ?>add">Ajouter un utilisateur</a>
    <a class="validButton" href="<?= URL ?>delete">Supprimer un utilisateur</a>
</div>
<div class="readButtons">
    <a class="validButton" href="<?= URL ?>?">Ajouter un jeu</a>
</div>

<h2 class="titreRead">Espace Administrateur</h2>

<table class="readContainer" border="1">
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
                <?php $imagePath = '../public/img/' . htmlspecialchars($user['image_name'] ?? 'default.jpg', ENT_QUOTES, 'UTF-8'); ?>
                <img src="<?= $imagePath; ?>" alt="Image de <?= htmlspecialchars($user['nom'] ?? 'Nom inconnu', ENT_QUOTES, 'UTF-8'); ?>" width="40">
            </td>
            <td><?= htmlspecialchars($user['u_lname'] ?? 'Nom inconnu', ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?= htmlspecialchars($user['u_fname'] ?? 'Prénom inconnu', ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?= htmlspecialchars($user['u_email'], ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?= htmlspecialchars($user['u_birth_Day'] ?? 'Date de naissance inconnue', ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?= htmlspecialchars($user['u_gender'], ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?= htmlspecialchars($user['u_phone'] ?? 'Téléphone inconnu', ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?= htmlspecialchars($user['role_description'] ?? 'Rôle inconnu', ENT_QUOTES, 'UTF-8'); ?></td>
            <td><a href="<?= URL ?>update/<?= htmlspecialchars($user['id_user'], ENT_QUOTES, 'UTF-8'); ?>">MODIFIER</a></td>
        </tr>
    <?php endforeach; ?>
</table>

<?php
$content = ob_get_clean();
require_once __DIR__ . "/template.php";
