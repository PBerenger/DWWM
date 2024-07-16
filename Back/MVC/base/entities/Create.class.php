    <?php
    require_once __DIR__ . '/../entities/Auth.class.php';
    require_once __DIR__ . '/../dbconnect/MyDbConnection.php';
    require_once __DIR__ . '/../entities/User.class.php';

    $message = "";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Validation des champs du formulaire
        $requiredFields = ['nom', 'prenom', 'email', 'telephone', 'password', 'role'];
        $allFieldsPresent = array_reduce($requiredFields, function ($carry, $field) {
            return $carry && isset($_POST[$field]) && !empty($_POST[$field]);
        }, true);

        if ($allFieldsPresent) {
            $nom = htmlspecialchars($_POST['nom']);
            $prenom = htmlspecialchars($_POST['prenom']);
            $email = htmlspecialchars($_POST['email']);
            $telephone = htmlspecialchars($_POST['telephone']);
            $password = htmlspecialchars($_POST['password']);
            $role = htmlspecialchars($_POST['role']);
            $image_name = isset($_FILES['image']['name']) ? htmlspecialchars($_FILES['image']['name']) : null;


            // Gestion du téléchargement d'image
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

            // Créer l'utilisateur
            $message = User::createUser($nom, $prenom, $email, $telephone, $password, $role, $image_name);
        } else {
            $message = "Tous les champs du formulaire doivent être remplis.";
        }
    }

    ob_start();
    ?>

    <div class="form-container">
        <form method="POST" action="" enctype="multipart/form-data">
            <label for="nom">Nom:</label>
            <input type="text" name="nom" required><br>

            <label for="prenom">Prénom:</label>
            <input type="text" name="prenom" required><br>

            <label for="email">Email:</label>
            <input type="email" name="email" required><br>

            <label for="telephone">Téléphone:</label>
            <input type="text" name="telephone" required><br>

            <label for="password">Mot de passe:</label>
            <input type="password" name="password" required><br>

            <label for="role">Rôle:</label>
            <select name="role" required>
                <option value="admin">Admin</option>
                <option value="non-admin">Non-Admin</option>
            </select><br>

            <label for="image">Image de profil :</label>
            <input class="parcourir" type="file" name="image" /><br>

            <input type="submit" value="Ajouter">
        </form>

        <p><?php echo $message; ?></p>
    </div>

    <?php
    $content=ob_get_clean();
    $titre = "Ajouter un utilisateur";
    require __DIR__ . "/../public/template.php";
    ?>