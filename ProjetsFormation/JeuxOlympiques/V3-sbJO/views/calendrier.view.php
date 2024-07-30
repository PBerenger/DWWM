<?php ob_start(); ?>


<!-- <div class="readButtons">
    <a class="validButton" href="<?= URL ?>add">Ajouter un utilisateur</a>
    <a class="validButton" href="<?= URL ?>delete/1">Supprimer un utilisateur</a>
</div> -->

<h2 class="titrePage">CALENDRIER</h2>

<table border="1">
    <tr>
        <th>Lieu</th>
        <th>Ville</th>
        <th>Epreuve</th>
        <th>Date</th>
        <th>Phase</th>
    </tr>
    <?php if (!isset($events) || !is_array($events)) : ?>
        <p>Les données des évènements sont manquantes.</p>
    <?php else : ?>
        <?php foreach ($events as $event) : ?>
            <tr>
                <td><?= htmlspecialchars($event['eventName'] ?? 'Nom inconnu', ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?= htmlspecialchars($event['eventRegion'] ?? 'Région inconnu', ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?= htmlspecialchars($event['eventGender'] ?? 'Epreuve inconnue', ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?= htmlspecialchars($event['eventDate'] ?? "Date d'épreuve inconnue", ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?= htmlspecialchars($event['phase'] ?? "phase inconnue", ENT_QUOTES, 'UTF-8'); ?></td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
</table>

<?php
$content = ob_get_clean();
require "template.php";