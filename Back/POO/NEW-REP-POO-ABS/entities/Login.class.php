<?php
ob_start();
require_once __DIR__ . '../entities/Auth.class.php';
require_once __DIR__ . '../dbconnect/MyDbConnection.php';

Auth::startSession();

// afficher le mot de passe crypté :
// echo password_hash("password2", PASSWORD_DEFAULT);


if (isset($_POST['email'], $_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $pdo = MyDbConnection::getInstance(); 
    $stmt = $pdo->prepare('SELECT id, pwd FROM users WHERE email = ?');
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['pwd'])) {
        $_SESSION['user_id'] = $user['id'];
        header('Location: ../index.php');
        exit();
    } else {
        $error = "Email ou mot de passe incorrect.";
    }
}
?>

<div class="login-container">
    <?php if (isset($error)): ?>
        <p class="error"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>
    <form method="POST">
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <label for="password">Mot de passe:</label>
        <input type="password" name="password" required>
        <input type="submit" value="Login">
    </form>
</div>

<?php
$content = ob_get_clean();
$titre = "Identification Espace Administrateur";
require __DIR__ . "/../public/template.php";
?>
