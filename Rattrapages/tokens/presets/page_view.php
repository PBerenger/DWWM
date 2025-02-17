<?php
ob_start();
// DANS LE CAS D'UNE INSCRIPTION.


// un token est il généré à chaque session ?

// génération du token pour éviter les injection CSRF (Cross-Site Request Forgery)
$token = bin2hex(random_bytes(32)); // 32 octets : même principe que le ashage ???
$_SESSION['csrf_token'] = $token;


// vérifie si le token est valide entre l'envoi du formulaire et le traitement du formulaire
if (!empty($_POST)) {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die('Token CSRF invalide');
    }

    $email = $_POST['email'];

    // si le token est valide, on enregistre l'email dans la base de données
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $db = new PDO('mysql:host=localhost;dbname=test', 'user', 'pass');
        $stmt = $db->prepare("INSERT INTO emails (email) VALUES (:email)");
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
    } else {
        echo "Email incorrect";
    }
}
?>


<!-- formulaire d'inscription -->

<form method="POST" action="submit.php">
    <input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
    <input type="email" name="email">
    <input type="submit" value="Envoyer">
</form>