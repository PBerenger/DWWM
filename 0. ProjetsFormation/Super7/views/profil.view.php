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

// Vérifie si les réponses existent
if (empty($responses)) {
    $responses = null; // Initialisation à null si aucune réponse
}

// Prépare les données pour le graphique radar (8 branches)
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

if ($responses && is_array($responses)) {
    $responses = [
        "interpersonnelle" => isset($responses["interpersonnelle"]) ? $responses["interpersonnelle"] : 0,
        "intrapersonnelle" => isset($responses["intrapersonnelle"]) ? $responses["intrapersonnelle"] : 0,
        "logique" => isset($responses["logique"]) ? $responses["logique"] : 0,
        "verbale" => isset($responses["verbale"]) ? $responses["verbale"] : 0,
        "spatiale" => isset($responses["spatiale"]) ? $responses["spatiale"] : 0,
        "musicale" => isset($responses["musicale"]) ? $responses["musicale"] : 0,
        "kinesthésique" => isset($responses["kinesthésique"]) ? $responses["kinesthésique"] : 0,
        "écologique" => isset($responses["écologique"]) ? $responses["écologique"] : 0
    ];

    // Convertir en pourcentage (0-10 -> 0-100%)
    $values = array_map(function ($response) {
        return min(100, max(0, intval($response) * 10)); // S'assurer que les valeurs restent entre 0 et 100
    }, array_values($responses));
} else {
    $values = [];
}

?>

<div id="profilPage">
    <div class="profilContainer-left">
        <h1>MON PROFIL</h1>
        <?php if (isset($utilisateur)) { ?>
            <h2>
                <?php
                if (!empty($utilisateur['u_fname']) || !empty($utilisateur['u_lname'])) {
                    echo htmlspecialchars(trim($utilisateur['u_fname'] . ' ' . $utilisateur['u_lname']));
                } else {
                    echo 'Nom inconnu';
                }
                ?>
            </h2>
            <div class="profil-img">
                <?php
                $imagePath = '../public/img/' . htmlspecialchars($utilisateur['image_name'] ?? 'default.jpg', ENT_QUOTES, 'UTF-8');
                $altText = !empty($utilisateur['u_fname']) ? 'Image de ' . htmlspecialchars($utilisateur['u_fname'], ENT_QUOTES, 'UTF-8') : 'Image par défaut';
                ?>
                <img src="<?= $imagePath; ?>" alt="<?= $altText; ?>" width="150" height="150">
            </div>

            <p>Email :
                <?php
                if (!empty($utilisateur['u_email'])) {
                    echo htmlspecialchars($utilisateur['u_email']);
                } else {
                    echo 'Non spécifié';
                }
                ?>
            </p>
            <p>Date de naissance :
                <?php
                if (!empty($utilisateur['u_date_birth'])) {
                    $date = new DateTime($utilisateur['u_date_birth']);
                    echo htmlspecialchars($date->format('d/m/Y'));
                } else {
                    echo 'Non spécifiée';
                }
                ?>
            </p>
            <p>Téléphone :
                <?php
                if (!empty($utilisateur['u_phone'])) {
                    echo htmlspecialchars($utilisateur['u_phone']);
                } else {
                    echo 'Non spécifié';
                }
                ?>
            </p>

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
            <a href="<?= URL ?>update/<?= $userId ?>">Modifier mes informations</a>
        </div>


    </div>

    <div class="profilContainer-right">
        <h2>MES STATISTIQUES</h2>

        <div class="rightBox <?php isset($responses) ? 'hidden' : ''; ?>">
            <?php if ($responses) { // Condition pour afficher seulement si des réponses existent 
            ?>
                <div class="resultsComp">
                    <ul>
                        <?php
                        $keys = array_keys($responses);
                        foreach ($keys as $index => $question) {
                            $answer = $responses[$question];
                            $percentage = min(100, max(0, intval($answer) * 10));
                            echo "<li><strong>" . htmlspecialchars($question) . ":</strong> " . htmlspecialchars($percentage) . "%</li>";
                        }
                        ?>
                    </ul>
                </div>
            <?php } ?>

            <!-- GRAPHIQUE RADAR -->
            <div class="graphRad">
                <?php if ($responses) { ?>
                    <canvas id="radarChart"></canvas>
                <?php } else { ?>
                    <p class="graphP">Veuillez remplir le <a class="graphLink" href='./questionnaire'>questionnaire</a> ou le formulaire de <a class="graphLink" href='./games'>jeu</a> pour générer vos statistiques.</p>
                <?php } ?>
            </div>
        </div>


        <!-- retour vers le questionnaire -->
        <div class="retourTQ">
            <?php if (!empty($responses)) { ?>
                <a href="./questionnaire" onclick="return confirmRefaireQuestionnaire();">Refaire le questionnaire</a>
            <?php } ?>
        </div>
    </div>
</div>

<!-- Inclure Chart.js seulement si les réponses existent -->
<?php if ($responses) { ?>
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
                backgroundColor: 'rgb(0, 0, 0, 0.1)',
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
<?php } ?>

<?php
$content = ob_get_clean();
require_once __DIR__ . "/template.php";
