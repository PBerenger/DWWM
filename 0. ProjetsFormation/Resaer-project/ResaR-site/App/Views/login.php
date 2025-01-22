<?php
$pageTitle = "Connection - ResaR";
require_once './Managers/Connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = htmlspecialchars($_POST['login']);  // Le champ email ou nom
    $password = $_POST['password'];

    // On vérifie d'abord si c'est un email ou un nom
    if (filter_var($login, FILTER_VALIDATE_EMAIL)) {
        // Si c'est un email
        $stmt = $pdo->prepare('SELECT * FROM users WHERE email = :login');
    } else {
        // Si ce n'est pas un email, on suppose que c'est un nom
        $stmt = $pdo->prepare('SELECT * FROM users WHERE lastName = :login');
    }
    
    $stmt->bindValue(':login', $login);
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
        $error = "Nom/email ou mot de passe incorrect.";
    }
}
?>


<h2>Se connecter :</h2>
<?php if (isset($error)): ?>
    <p style="color: red;"><?= $error; ?></p>
<?php endif; ?>
<form method="POST">
    <input type="email" name="email" placeholder="Email ou Nom" required>
    <input type="password" name="password" placeholder="Mot de passe" required>
    <button type="submit">Connexion</button>
</form>