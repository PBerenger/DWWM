<?php
// Démarrer la sortie HTML
ob_start();
header("Content-Type: text/html; charset=UTF-8");

require_once __DIR__ . '/../entities/Auth.class.php';
require_once __DIR__ . '/../entities/User.class.php';
Auth::verifyAdmin();

// Vérifier si un ID d'utilisateur est fourni
if (isset($_GET['id'])) {
    $user = User::getUserById($_GET['id']);

    if (!$user) {
        echo "Utilisateur non trouvé.";
        exit();
    }
} else {
    echo "Aucun ID d'utilisateur fourni.";
    exit();
}

// Traiter le formulaire de mise à jour
if (isset($_POST['id'], $_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['telephone'], $_POST['role'])) {
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $role = $_POST['role'];

    // Validation email et téléphone
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Adresse email invalide.";
        exit();
    }
    if (!preg_match("/^[0-9]{10}$/", $telephone)) {
        echo "Numéro de téléphone invalide.";
        exit();
    }

    // Gestion du fichier image
    $image_name = $user['image_name'];

    if (isset($_FILES['image_name']) && $_FILES['image_name']['error'] == UPLOAD_ERR_OK) {
        $upload_dir = __DIR__ . '/../public/img/';
        $tmp_name = $_FILES['image_name']['tmp_name'];
        $image_name = basename($_FILES['image_name']['name']);
        $upload_file = $upload_dir . $image_name;

        $check = getimagesize($tmp_name);
        if ($check !== false) {
            if (move_uploaded_file($tmp_name, $upload_file)) {
                echo "L'image a été téléchargée avec succès.";
            } else {
                echo "Erreur lors du téléchargement de l'image.";
                exit();
            }
        } else {
            echo "Le fichier n'est pas une image valide.";
            exit();
        }
    }

    // Mettre à jour les informations de l'utilisateur dans la base de données
    $message = User::updateUser($id, $nom, $prenom, $email, $telephone, $role, $image_name);
    echo $message;
}
?>


<div class="form-container">
    <?php if (isset($user)) : ?>
        <form method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($user['id']); ?>">
            <label for="nom">Nom:</label>
            <input type="text" name="nom" value="<?php echo htmlspecialchars($user['nom']); ?>" required><br>
            <label for="prenom">Prénom:</label>
            <input type="text" name="prenom" value="<?php echo htmlspecialchars($user['prenom']); ?>" required><br>
            <label for="email">Email:</label>
            <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required><br>
            <label for="telephone">Téléphone:</label>
            <input type="text" name="telephone" value="<?php echo htmlspecialchars($user['telephone']); ?>" required><br>
            <label for="role">Rôle:</label>
            <select name="role" required>
                <option value="admin" <?php if ($user['role'] == 'admin') echo 'selected'; ?>>Admin</option>
                <option value="non-admin" <?php if ($user['role'] == 'non-admin') echo 'selected'; ?>>Non-Admin</option>
            </select><br>
            <label for="image_name">Image:</label>
            <input class="parcourir" type="file" name="image_name" accept="image/*"><br>
            <input type="submit" value="Mettre à jour">
        </form>
    <?php else : ?>
        <p>Utilisateur non trouvé.</p>
    <?php endif; ?>
</div>


<?php
$content = ob_get_clean();
$titre = "Modifier un utilisateur";
require __DIR__ . "/../public/template.php";
?>