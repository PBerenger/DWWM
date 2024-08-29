<?php
require_once './Models/UserManager.class.php';

class UserController
{
    private $userManager;

    // Initialiser la propriété $userManager en créant une nouvelle instance de UserManager
    public function __construct()
    {
        $this->userManager = new UserManager();
    }

    //----------------------------------------------------------------------------------------------------------------------------------------
    // Récupère tous les utilisateurs via $userManager->getAllUsers().
    // Inclut le fichier de vue read.view.php pour afficher la liste des utilisateurs.
    public function listUsers()
    {
        if (!$this->isAdmin()) {
            header('Location: ' . URL . 'accueil'); // Redirection si pas administrateur
            exit;
        }

        $users = $this->userManager->getAllUsers();
        require './views/read.view.php';
    }

    //----------------------------------------------------------------------------------------------------------------------------------------
    // Récupère les informations d'un utilisateur spécifique via $userManager->getUserById($id).
    // Inclut le fichier de vue update.view.php pour afficher le formulaire de mise à jour avec les informations de l'utilisateur.
    public function UpdateForm($id)
    {
        $utilisateur = $this->userManager->getUserById($id);
        require __DIR__ . '/../views/update.view.php';
    }

    //----------------------------------------------------------------------------------------------------------------------------------------
    // Si l'utilisateur est admin
    public function isAdmin()
    {
        if (!isset($_SESSION['user_id'])) {
            echo "il n'y a personne dans la base de donnée.";
            return false;
        }
        $user = $this->userManager->getUserById($_SESSION['user_id']);
        return $user['role_id'] === 1;
    }

    //----------------------------------------------------------------------------------------------------------------------------------------
    // Extrait les informations de l'utilisateur (ID, nom, prénom, email, téléphone, rôle) depuis le tableau $data.
    // Gère l'upload d'une image de profil si un fichier est fourni et valide.
    // Appelle $userManager->updateUser pour mettre à jour les informations de l'utilisateur en base de données.
    // Affiche la liste des utilisateurs mise à jour en appelant listUsers().
    public function updateUser($data, $files)
    {
        $id = $data['id_user'];
        $nom = $data['nom'];
        $prenom = $data['prenom'];
        $email = $data['email'];
        $dateNaissance = $data['dateNaissance'];
        $genre = $data['genre'];
        $telephone = $data['telephone'];
        $role = $data['role'];
        $pwd = $data['password'];
        $confirm_pwd = $_POST['confirm_password'];
        $nomImage = 'default.jpg';

        if ($pwd !== $confirm_pwd) {
            $message = "Les mots de passe ne correspondent pas.";
            header('Location: /add');
            echo $message;
            return;
        }

        // Hachage du mot de passe
        $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT);

        // Gestion de l'upload de l'image
        if (isset($files['image']) && $files['image']['error'] === UPLOAD_ERR_OK) {
            $tmp_name = $files['image']['tmp_name'];
            $name = basename($files['image']['name']);
            if (move_uploaded_file($tmp_name, "./public/img/$name")) {
                $nomImage = $name;
                $message = 'Image uploadée avec succès.';
            } else {
                $message = 'Erreur lors de l\'upload de l\'image.';
            }
        } else if (isset($files['image']) && $files['image']['error'] !== UPLOAD_ERR_NO_FILE) {
            $message = 'Erreur lors de l\'upload de l\'image.';
        }

        $message = $this->userManager->updateUser($id, $nom, $prenom, $email, $dateNaissance, $genre, $telephone, $role, $nomImage, $hashedPwd);
        $this->listUsers();
    }

    //----------------------------------------------------------------------------------------------------------------------------------------
    // // Supprime un utilisateur par id
    public function deleteForm()
    {
        $users =  $this->userManager->getAllUsers();
        require './views/delete.view.php';
    }

    public function deleteUsers(array $ids)
    {
        foreach ($ids as $id) {
            $message = $this->userManager->deleteUser($id);
            // Optionnel : Vous pouvez stocker ou afficher les messages ici
        }
        // Après la suppression, afficher la liste des utilisateurs
        $this->listUsers();
    }


    //----------------------------------------------------------------------------------------------------------------------------------------
    // Fonction qui permet d'ajouter un nouvel utilisateur dans une base de données.
    public function addUser($data, $files)
    {
        $nom = $data['nom'];
        $prenom = $data['prenom'];
        $email = $data['email'];
        $dateNaissance = $data['dateNaissance'];
        $genre = $data['genre'];
        $telephone = $data['telephone'];
        $pwd = $data['password'];
        $confirm_pwd = $data['confirm_password'];
        $role = $data['role'];
        $nomImage = 'default.jpg';

        // Vérification du mot de passe correspondant
        if ($pwd !== $confirm_pwd) {
            $message = "Les mots de passe ne correspondent pas.";
            header('Location: /add');
            echo $message;
            return;
        }

        // Hachage du mot de passe
        $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT);

        // Gestion de l'upload de l'image
        if (isset($files['image']) && $files['image']['error'] === UPLOAD_ERR_OK) {
            // récupère le chemin de l'image
            $tmp_name = $files['image']['tmp_name'];
            // récupère juste le nom de l'image
            $nomImage = basename($files['image']['name']);
            // déplace le téléchargement vers le répertoire cible
            if (!move_uploaded_file($tmp_name, "./public/img/$nomImage")) {
                $message = "Erreur lors du téléchargement de l'image.";
                echo $message;
                return;
            }
        }

        $message = $this->userManager->addUser($nom, $prenom, $email, $dateNaissance, $genre, $telephone, $role, $nomImage, $hashedPwd);
        // Ajoutez une vérification pour $message si nécessaire
        header('Location: /read');
        exit;
    }

    //----------------------------------------------------------------------------------------------------------------------------------------
    // Méthode pour afficher le formulaire d'ajout
    public function addForm()
    {
        require './views/add.view.php';
    }
}
