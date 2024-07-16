<?php
require_once './Models/UserManager.class.php';

class UserController {
    private $userManager;

    // Initialiser la propriété $userManager en créant une nouvelle instance de UserManager
    public function __construct() {
        $this->userManager = new UserManager();
    }

    // Récupère tous les utilisateurs via $userManager->getAllUsers().
    // Inclut le fichier de vue read.view.php pour afficher la liste des utilisateurs.
    public function listUsers() {
        $users = $this->userManager->getAllUsers();
        require './views/read.view.php';
    }

    // Récupère les informations d'un utilisateur spécifique via $userManager->getUserById($id).
    // Inclut le fichier de vue update.view.php pour afficher le formulaire de mise à jour avec les informations de l'utilisateur.
    public function UpdateForm($id) {
        $utilisateur = $this->userManager->getUserById($id);
        require './views/update.view.php';
    }

    // Extrait les informations de l'utilisateur (ID, nom, prénom, email, téléphone, rôle) depuis le tableau $data.
    // Gère l'upload d'une image de profil si un fichier est fourni et valide.
    // Appelle $userManager->updateUser pour mettre à jour les informations de l'utilisateur en base de données.
    // Affiche la liste des utilisateurs mise à jour en appelant listUsers().
    public function updateUser($data, $files) {
        $id = $data['id'];
        $nom = $data['nom'];
        $prenom = $data['prenom'];
        $email = $data['email'];
        $telephone = $data['telephone'];
        $role = $data['role'];
        $nomImage = $data['currentImage'];

        // Gestion de l'upload de l'image
        if (isset($files['image']) && $files['image']['error'] === UPLOAD_ERR_OK) {
            $tmp_name = $files['image']['tmp_name'];
            $name = basename($files['image']['name']);
            move_uploaded_file($tmp_name, "./public/images/$name");
            $nomImage = $name;
        }


        $message = $this->userManager->updateUser($id, $nom, $prenom, $email, $telephone, $role, $nomImage);
        $this->listUsers(); 
    }

    // Supprime un utilisateur par id
    public function deleteForm(){
        $users =  $this->userManager->getAllUsers();
        require './views/delete.view.php';
    }

    public function deleteUser($id){
        $message = $this->userManager->deleteUser($id);
        $this->listUsers();
    }


    // Fonction qui permet d'ajouter un nouvel utilisateur dans une base de données.
    public function addUser($data, $files) {
        $id = $data['id'];
        $nom = $data['nom'];
        $prenom = $data['prenom'];
        $email = $data['email'];
        $telephone = $data['telephone'];
        $role = $data['role'];
        $pwd = $data['pwd'];
        $nomImage = 'default.jpg';

        // Gestion de l'upload de l'image
        if (isset($files['image']) && $files['image']['error'] === UPLOAD_ERR_OK) {
            // récupère le chemin de l'image
            $tmp_name = $files['image']['tmp_name'];
            // récupère juste le nom de l'image
            $name = basename($files['image']['name']);
            // déplace le téléchargement vers le répertoire cible
            move_uploaded_file($tmp_name, "./public/images/$name");
            $nomImage = $name;
        }

        $message = $this->userManager->addUser($nom, $prenom, $email, $telephone, $role, $nomImage, $pwd);
        $this->listUsers();
    }

    // Méthode pour afficher le formulaire d'ajout
    public function addForm() {
        require './views/add.view.php';
    }
}