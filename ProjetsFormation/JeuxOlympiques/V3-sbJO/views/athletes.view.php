<?php ob_start(); ?>

<!-- <div class="readButtons">
    <a class="validButton" href="<?= URL ?>add">Ajouter un Athlète</a>
    <a class="validButton" href="<?= URL ?>delete/1">Supprimer un athlète</a>
</div> -->

<h2 class="titrePage">ATHLETES</h2>

<table border="1">
    <tr>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Genre</th>
        <th>Année de naissance</th>
        <th>Pays</th>
        <th>CIO</th>
        <th>Médaille d'Or</th>
        <th>Médaille d'argent</th>
        <th>Médaille de bronze</th>
    </tr>

    <?php if (!isset($athletes) || !is_array($athletes)) : ?>
        <p>Les données des athlètes sont manquantes.</p>
    <?php else : ?>
        <?php foreach ($athletes as $athlete) : ?>
            <tr>
                <td><?= htmlspecialchars($athlete['athleteLastName'] ?? 'Nom inconnu', ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?= htmlspecialchars($athlete['athleteFirstName'] ?? 'Prénom inconnu', ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?= htmlspecialchars($athlete['athleteGender'] ?? 'Genre inconnu', ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?= htmlspecialchars($athlete['athleteDateBirth'] ?? 'Date de naissance inconnue', ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?= htmlspecialchars($athlete['countryName'] ?? "pays inconnu", ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?= htmlspecialchars($athlete['countryShortName'] ?? "CIO inconnu", ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?= htmlspecialchars($athlete['gold'] ?? "aucune médaille d'or", ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?= htmlspecialchars($athlete['silver'] ?? "aucune médaille d'argent", ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?= htmlspecialchars($athlete['bronze'] ?? "aucune médaille de bronze", ENT_QUOTES, 'UTF-8'); ?></td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>

</table>

<?php
$content = ob_get_clean();
require "template.php";
?>