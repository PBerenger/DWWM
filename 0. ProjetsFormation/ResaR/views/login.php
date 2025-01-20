<?php
require_once './mydbConnection/Database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];

    $stmt = $pdo->prepare('SELECT * FROM users WHERE email = :email');
    $stmt->bindValue(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // Connexion réussie
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['name'] = $user['name'];

        if ($user['role'] === 'admin') {
            header('Location: index.php?page=admin_restaurant');
        } else {
            header('Location: index.php?page=home');
        }
        exit();
    } else {
        $error = "Email ou mot de passe incorrect.";
    }
}
?>

<h2>Se connecter :</h2>
<?php if (isset($error)): ?>
    <p style="color: red;"><?= $error; ?></p>
<?php endif; ?>
<form method="POST">
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Mot de passe" required>
    <button type="submit">Connexion</button>
</form>

<?php
$content = ob_get_clean();
// require_once __DIR__ . "/template.php";
?>
