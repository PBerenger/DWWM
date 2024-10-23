<?php
ob_start();
$authManager = new AuthManager();
$authManager->startSession();
require_once __DIR__ . '../../Controllers/profilController.class.php';

$profilController = new ProfilController();
$userId = $_SESSION['id_user']; // Assurez-vous que l'ID utilisateur est bien stocké dans la session
$data = $profilController->afficherProfil($userId);

$utilisateur = $data['utilisateur'];
$responses = $data['responses'];

// Préparer les données pour le graphique radar (8 branches)
$labels = [
    'Interpersonnelle',
    'Intrapersonnelle',
    'Logique',
    'Verbale',
    'Spatiale',
    'Musicale',
    'Kinesthésique',
    'Ecologique'
];

$responses = [
    "interpersonnelle" => $responses["interpersonnelle"],
    "intrapersonnelle" => $responses["intrapersonnelle"],
    "logique" => $responses["logique"],
    "verbale" => $responses["verbale"],
    "spatiale" => $responses["spatiale"],
    "musicale" => $responses["musicale"],
    "kinesthesique" => $responses["kinesthesique"],
    "ecologique" => $responses["ecologique"]
];


// Valeurs à remplacer par les réponses
// Convertir en pourcentage (0-10 -> 0-100%)
$values = array_map(function ($response) {
    return min(100, max(0, intval($response) * 10)); // S'assurer que les valeurs restent entre 0 et 100
}, array_values($responses));
?>

<div id="profilPage">
    <div class="profilContainer-left">
        <h1>MON PROFIL</h1>
        <?php if (isset($utilisateur)) { ?>
            <h2><?php echo htmlspecialchars($utilisateur['u_fname'] . ' ' . $utilisateur['u_lname']); ?></h2>
            <div class="profil-img">
                <?php $imagePath = '../public/img/' . htmlspecialchars($utilisateur['image_name'] ?? 'default.jpg', ENT_QUOTES, 'UTF-8'); ?>
                <img src="<?= $imagePath; ?>" alt="Image de <?= htmlspecialchars($utilisateur['u_fname'] ?? 'Nom inconnu', ENT_QUOTES, 'UTF-8'); ?>" width="150" height="150">
            </div>
            <p>Email : <?php echo htmlspecialchars($utilisateur['u_email']); ?></p>
            <p>Date de naissance : <?php echo htmlspecialchars($utilisateur['u_date_birth']); ?></p>
            <p>Téléphone : <?php echo htmlspecialchars($utilisateur['u_phone']); ?></p>
            <p>Genre :
                <?php
                if ($utilisateur['u_gender'] === 'M') {
                    echo 'Masculin';
                } elseif ($utilisateur['u_gender'] === 'F') {
                    echo 'Féminin';
                } else {
                    echo 'Non spécifié';
                }
                ?>
            </p>
        <?php } else { ?>
            <p>Utilisateur non trouvé.</p>
        <?php } ?>

        <div class="modifBT">
            <a href="./questionnaire">Modifier mes informations</a>
        </div>

    </div>

    <div class="profilContainer-right">
        <h2>MES STATISTIQUES</h2>

        <div class="rightBox">
            <div class="resultsComp">
                <?php
                if (!empty($responses)) {
                    echo "<ul>";
                    // Utilisez array_keys() pour obtenir les clés des réponses
                    $keys = array_keys($responses);
                    foreach ($keys as $index => $question) {
                        $answer = $responses[$question]; // Obtenez la réponse correspondante
                        // Convertir la réponse en pourcentage
                        $percentage = min(100, max(0, intval($answer) * 10));
                        echo "<li><strong>" . htmlspecialchars($question) . ":</strong> " . htmlspecialchars($percentage) . "%</li>";
                    }
                    echo "</ul>";
                } else {
                    echo "<p>Aucune statistique disponible.</p>";
                }
                ?>
            </div>



            <!-- GRAPHIQUE RADAR -->
            <div class="graphRad">
                <canvas id="radarChart" width="400" height="400"></canvas>
            </div>
        </div>

        <div class="retourTQ">
            <a href="./questionnaire" onclick="return confirmRefaireQuestionnaire();">Refaire le questionnaire</a>
        </div>

    </div>
</div>

<!-- Inclure Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const labels = <?php echo json_encode($labels); ?>;
    const dataValues = <?php echo json_encode($values); ?>;

    const data = {
        labels: labels,
        datasets: [{
            label: 'Mes Réponses (%)',
            data: dataValues,
            fill: true,
            backgroundColor: 'rgb(0, 0, 0, 0.2)',
            borderColor: '#387F39',
            pointBackgroundColor: '#387F39',
            pointBorderColor: '#fff',
            pointHoverBackgroundColor: '#fff',
            pointHoverBorderColor: 'rgb(75, 192, 192)'
        }]
    };

    const config = {
        type: 'radar',
        data: data,
        options: {
            scales: {
                r: {
                    angleLines: {
                        display: true
                    },
                    suggestedMin: 0,
                    suggestedMax: 100,
                    ticks: {
                        stepSize: 50,
                        callback: function(value) {
                            if (value === 0 || value === 50 || value === 100) {
                                return value + '%';
                            }
                        },
                        font: {
                            size: 14,
                            family: 'Arial, sans-serif',
                            weight: 'normal',
                            color: 'rgba(0, 0, 0, 0)'
                        },
                        color: 'rgba(0, 0, 0, 0.5)'
                    }
                }
            },
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    };

    const radarChart = new Chart(
        document.getElementById('radarChart'),
        config
    );
</script>

<?php
$content = ob_get_clean();
require_once __DIR__ . "/template.php";
