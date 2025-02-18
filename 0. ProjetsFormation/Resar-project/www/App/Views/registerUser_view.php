<?php
// if (session_status() === PHP_SESSION_NONE) {
//     session_start();
// }

// ob_start();

$pageTitle = "Inscription utilisateur";

// Vérification CSRF - Ne pas régénérer le token à chaque chargement
// if (!isset($_SESSION['csrf_token'])) {
//     $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
// }

var_dump($_SESSION);
if (isset($_POST['destroysession'])) {
    session_destroy();
}
echo'hello';
// if ($_SERVER["REQUEST_METHOD"] === "POST" & isset($_POST['submitBut'])) {
//     $token = $_POST['csrf_token'] ?? '';

//     // Vérification CSRF
//     if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
//         // Stocker le message d'erreur dans la session
//         $_SESSION['error_message'] = "Erreur CSRF : tentative invalide.";
//         // Rediriger vers la page d'erreur
//         header("Location: error.php");
//         exit;
//     }

//     // Supprimer le token après utilisation pour éviter la réutilisation
//     unset($_SESSION['csrf_token']);

//     // Récupération des données du formulaire
//     $firstName = trim($_POST['firstName'] ?? '');
//     $lastName = trim($_POST['lastName'] ?? '');
//     $email = trim($_POST['email'] ?? '');
//     $password = $_POST['password'] ?? '';
//     $passwordRepeat = $_POST['passwordRepeat'] ?? '';
//     $isAdmin = isset($_POST['isAdmin']) ? 1 : 0;

//     // Vérification que les mots de passe correspondent
//     if ($password !== $passwordRepeat) {
//         die("Les mots de passe ne correspondent pas.");
//     }

//     // Exécution de l'inscription
//     // $register = new RegisterUser();
//     $register->execute($_POST);

//     // Régénérer un nouveau token après l'inscription
//     $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
// }
?>


<H2>S'inscrire</H2>
<p>Inscrivez-vous et réservez une table dans le restaurant de votre choix.</p>

<main>
    <form action="?page=registerUser" method="POST">
        <h2>Inscription</h2>

        <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>">

        <div class="form-group">
            <label for="firstName">Prénom :</label>
            <input type="text" id="firstName" name="firstName" value="Bou" required>
        </div>

        <div class="form-group">
            <label for="lastName">Nom :</label>
            <input type="text" id="lastName" name="lastName" value="Ba" required>
        </div>

        <div class="form-group">
            <label for="email">Adresse email :</label>
            <input type="email" id="email" name="email" value="bou.ba@gmail.com" required>
        </div>

        <div class="form-group">
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" value="password123" required>
        </div>

        <div class="form-group">
            <label for="passwordRepeat">Répéter le mot de passe :</label>
            <input type="password" id="passwordRepeat" name="passwordRepeat" value="password123" required>
        </div>

        <button type="submit" name="submitBut">S'inscrire</button>
        <button type="submit" name="destroysession">destroy</button>
    </form>
</main>

<?php
$content = ob_get_clean();
$pageTitle = "Inscription utilisateur / administrateur - ResaR";
require "layout.php";
