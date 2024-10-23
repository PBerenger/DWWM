<?php ob_start(); ?>

<!-- <div class="readButtons">
    <a class="validButton" href="<?= URL ?>add">Ajouter un Athlète</a>
    <a class="validButton" href="<?= URL ?>delete/1">Supprimer un athlète</a>
</div> -->

<h2 class="titrePage">ATHLETES</h2>

<div id="sort-Buttons">
    <!-- type search -->
    <div class="search-container">
        <input type="search" id="searchInput" placeholder="Rechercher par nom et/ou prénom" oninput="filterTable()">
    </div>
    
    <!-- Select pays -->
    <div class="sort-container">
        <select id="countrySelect" onchange="sortByCountry()">
            <option value="">Trier par pays</option>
            <?php
            // Assurez-vous de récupérer les pays uniques pour le sélecteur
            $countries = array_unique(array_column($athletes, 'countryName'));
            foreach ($countries as $country) :
                $country = htmlspecialchars($country, ENT_QUOTES, 'UTF-8');
            ?>
                <option value="<?= $country ?>"><?= $country ?></option>
            <?php endforeach; ?>
        </select>
    </div>
</div>

<table border="1" id="athletesTable">
    <thead>
        <tr>
            <th class="th0" onclick="sortTable(0)">Nom</th>
            <th class="th1" onclick="sortTable(1)">Prénom</th>
            <th class="th2" onclick="sortTable(2)">Genre</th>
            <th class="th3" onclick="sortTable(3)">Année de naissance</th>
            <th class="th4" onclick="sortTable(4)">Pays</th>
            <th class="th5" onclick="sortTable(5)">CIO</th>
            <th class="th6" onclick="sortTable(6)">Médaille d'Or</th>
            <th class="th7" onclick="sortTable(7)">Médaille d'argent</th>
            <th class="th8" onclick="sortTable(8)">Médaille de bronze</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!isset($athletes) || !is_array($athletes)) : ?>
            <tr><td colspan="9">Les données des athlètes sont manquantes.</td></tr>
        <?php else : ?>
            <?php foreach ($athletes as $athlete) : ?>
                <tr>
                    <td><?= htmlspecialchars($athlete['athleteLastName'] ?? 'Nom inconnu', ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?= htmlspecialchars($athlete['athleteFirstName'] ?? 'Prénom inconnu', ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?= htmlspecialchars($athlete['athleteGender'] ?? 'Genre inconnu', ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?= htmlspecialchars($athlete['athleteDateBirth'] ?? 'Date de naissance inconnue', ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?= htmlspecialchars($athlete['countryName'] ?? "Pays inconnu", ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?= htmlspecialchars($athlete['countryShortName'] ?? "CIO inconnu", ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?= htmlspecialchars($athlete['gold'] ?? "aucune médaille d'or", ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?= htmlspecialchars($athlete['silver'] ?? "aucune médaille d'argent", ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?= htmlspecialchars($athlete['bronze'] ?? "aucune médaille de bronze", ENT_QUOTES, 'UTF-8'); ?></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>

<?php
$content = ob_get_clean();
require "template.php";
?>