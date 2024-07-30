<?php ob_start(); ?>

<h2 class="titrePage">CLASSEMENT</h2>

<div class="container">
    <h1>Tableau de Score</h1>
    <table id="scoreTable">
        <thead>
            <tr>
                <th onclick="sortTable(0)">Nom</th>
                <th>CIO</th>
                <th onclick="sortTable(1)">Score</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!isset($athletes) || !is_array($athletes)) : ?>
                <tr>
                    <td colspan="2">Les données des athlètes sont manquantes.</td>
                </tr>
            <?php else : ?>
                <?php foreach ($athletes as $athlete) : ?>
                    <tr>
                        <td><?= htmlspecialchars($athlete['athleteLastName'] ?? 'Nom inconnu', ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?= htmlspecialchars($athlete['countryShortName'] ?? "CIO inconnu", ENT_QUOTES, 'UTF-8'); ?></td>

                        <td><?= htmlspecialchars($athlete['score'] ?? 'Score inconnu', ENT_QUOTES, 'UTF-8'); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php
$content = ob_get_clean();
require "template.php";
?>