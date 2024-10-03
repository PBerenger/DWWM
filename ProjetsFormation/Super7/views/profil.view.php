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
    </div>

    <div class="profilContainer-right">
        <h2>MES STATISTIQUES</h2>

        <div class="rightBox">

            <div class="resultsComp">
                <?php
                if (!empty($responses)) {
                    echo "<ul>";
                    foreach ($responses as $question => $answer) {
                        echo "<li><strong>" . htmlspecialchars($question) . ":</strong> " . htmlspecialchars($answer) . "</li>";
                    }
                    echo "</ul>";
                } else {
                    echo "<p>Aucune statistique disponible.</p>";
                }
                ?>
            </div>

            <div class="graphRad">
                hi
            </div>
        </div>

    </div>
</div>
</div>

<script src="<?= URL ?>public/js/graph.js"></script>

<?php
$content = ob_get_clean();
require_once __DIR__ . "/template.php";
