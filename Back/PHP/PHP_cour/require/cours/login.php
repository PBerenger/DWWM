<?php
session_start();
require_once 'dbConnect.php';


if (session_status() == PHP_SESSION_NONE) session_start();
//ou
// if(session_status()==PHP_SESSION_NONE){
//     session_start();
// }

// Récupérer les données du formulaire
if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $pdo = getPDOConnection();
    $stmt = $pdo->prepare('SELECT id FROM Users WHERE email = ?');
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user) {
        $_SESSION['user_id'] = $user['id'];
        header('Location:index.php');
        exit();
    }else{
        $error = 'Utilisateur non trouvé';
    }
}

?>

<div class="login=container">
    <?php if(isset($error))

    ?>

    <div class="formulaire">
        <h2>Connection</h2>
        <br>
        <form action="" method="POST">
            <!-- Email -->
            <label class="email" for="email">Email : </label>
            <br>
            <input type="email" name="email" id="email" value="">
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