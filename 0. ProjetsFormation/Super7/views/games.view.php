<?php
ob_start();

require_once __DIR__ . '../../Models/myDbConnection.php';
require_once __DIR__ . '../../Models/gamesManager.class.php';

// Créer une instance de boardGamesManager pour récupérer les compétences
$profilManager = new boardGamesManager();
$skillsId = 1; // Remplacez par l'ID utilisateur approprié
$skills = $profilManager->getSkills();

$boardG = 1;
try {
    // Requête pour récupérer tous les jeux de plateau
    $boardGames = $profilManager->getBoardGames(); // Récupérer tous les jeux
    $skills = $profilManager->getSkills(); // Récupérer toutes les compétences

    if ($boardGames) {
        echo "<h1>Jeux de Plateau</h1>";
        echo "<table border='1'>
                <tr>
                    <th>Nom</th>
                    <th>Nombre Max de Joueurs</th>
                    <th>Durée (min)</th>
                    <th>Aime</th>
                </tr>";

        // Afficher chaque jeu dans une ligne du tableau
        foreach ($boardGames as $game) {
            echo "<tr>
                    <td>{$game['bg_name']}</td>
                    <td>{$game['bg_max_players']}</td>
                    <td>{$game['bg_duration']}</td>
                    <td>{$game['bg_likes']}</td>
                  </tr>";
        }
        
        echo "</table>";
    } else {
        echo "<p>Aucun jeu trouvé.</p>";
    }
} catch (PDOException $e) {
    echo "Erreur lors de la récupération des jeux: " . $e->getMessage();
}


?>

<?php
$content = ob_get_clean();
require_once __DIR__ . "/template.php";