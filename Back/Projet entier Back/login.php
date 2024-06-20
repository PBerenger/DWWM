<?php
session_start();
require_once 'dbConnect.php';
require 'functions.php';


if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
//ou
// if(session_status()==PHP_SESSION_NONE){
//     session_start();
// }

// Récupérer les données du formulaire

if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];

    $pdo = getPDOConnection();
    $stmt = $pdo->prepare('SELECT id, mdp FROM Users WHERE email = ?');
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    // Vérification du mot de passe
    if ($user && password_verify($mdp, $user['mdp'])) {
        $_SESSION['user_id'] = $user['id'];
        phpAlert("connection établie.");
        header('Location:index.php');
        exit();
    }else{
        $error = htmlspecialchars('Utilisateur non trouvé');
    }
}

?>

    <div class="form-container">
        <h2>Connection</h2>
        <br>
        <form method="POST">
            <!-- Email -->
            <label class="email" for="email">Email : </label>
            <input type="email" name="email" id="email" value="">
            <br>
            <!-- mdp -->
            <label for="mdp">Mot de passe :</label>
            <input type="password" name="mdp" required><br>
            <br>

            <div class="buttonValid">
                <input type="submit" value="Valider">
            </div>
        </form>
    </div>

<?php
$content = ob_get_clean();
$titre = "Identification Admin";
require "template.php";
?>