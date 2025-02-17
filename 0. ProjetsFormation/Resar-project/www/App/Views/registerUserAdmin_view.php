<?php
ob_start();
// Vérification CSRF
$token = bin2hex(random_bytes(32));
$_SESSION['csrf_token'] = $token;

use App\Config\DbConnect;
// vérifie si le token est valide entre l'envoi du formulaire et le traitement du formulaire
if (!empty($_POST)) {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die('Token CSRF invalide');
    }

    $email = $_POST['email'];

    // si le token est valide, on enregistre l'email dans la base de données
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $db = DbConnect::getPDO();
        $stmt = $db->prepare("INSERT INTO emails (email) VALUES (:email)");
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
    } else {
        echo "Email incorrect";
    }
    header("Location: success.php");
    exit;
}
?>

<main>
    <!-- Formulaire HTML -->
    <form action="registerUserAdmin.php" method="POST">
        <h2>Inscription</h2>

        <div class="form-group">
            <label for="firstName">Prénom :</label>
            <input type="text" id="firstName" name="firstName" required>
        </div>

        <div class="form-group">
            <label for="lastName">Nom :</label>
            <input type="text" id="lastName" name="lastName" required>
        </div>

        <div class="form-group">
            <input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
            <label for="email">Adresse email :</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div class="form-group">
            <label for="passwordRepeat">Répéter le mot de passe :</label>
            <input type="password" id="passwordRepeat" name="passwordRepeat" required>
        </div>

        <button type="submit">S'inscrire</button>
    </form>

</main>

<?php
$content = ob_get_clean();
$pageTitle = "Inscription utilisateur / administrateur - ResaR";
// $wrapperName = "wrapperAccueil";
require "layout.php";
