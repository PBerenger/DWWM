<?php ob_start(); ?>

<h2 class="titrePage">CLASSEMENT</h2>

<?php
// Code de connexion ici

// Définir l'événement et la phase que nous voulons afficher
$event_name = 'Place de la Concorde';
$phase = 'finale';

// Préparer la requête SQL
$sql = "
    SELECT e.eventName, e.eventGender, a.athleteLastName, a.athleteFirstName, a.gold, a.silver, a.bronze
    FROM event e
    JOIN athlete a ON a.id_country = e.eventRegion
    WHERE e.eventName = ? AND e.phase = ?
    ORDER BY a.gold DESC, a.silver DESC, a.bronze DESC
";

// Préparer et exécuter la requête
$stmt = $conn->prepare($sql);
$stmt->bind_param('ss', $event_name, $phase);
$stmt->execute();
$result = $stmt->get_result();

// Afficher les résultats
echo "<h1>Classement des athlètes pour l'événement '$event_name' ($phase)</h1>";
echo "<table border='1'>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Médaille d'Or</th>
            <th>Médaille d'Argent</th>
            <th>Médaille de Bronze</th>
        </tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>" . htmlspecialchars($row['athleteLastName']) . "</td>
            <td>" . htmlspecialchars($row['athleteFirstName']) . "</td>
            <td>" . htmlspecialchars($row['gold']) . "</td>
            <td>" . htmlspecialchars($row['silver']) . "</td>
            <td>" . htmlspecialchars($row['bronze']) . "</td>
          </tr>";
}

echo "</table>";

// Fermer la connexion
$stmt->close();
$conn->close();
?>




<?php
$content = ob_get_clean();
$titre = "Voir les utilisateurs";
require "template.php";