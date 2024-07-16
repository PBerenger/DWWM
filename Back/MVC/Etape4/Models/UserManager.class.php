<?php
require_once './Models/MyDbConnection.php';

class UserManager
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = MyDbConnection::getInstance();
    }


    // Cette fonction est conçue pour récupérer des informations sur tous les utilisateurs présents dans la base de données.
    public function getAllUsers()
    {
        $sql = '
            SELECT users.id, users.nom, users.prenom, users.email, users.telephone, userroles.role, users.image_name
            FROM users
            LEFT JOIN userroles ON users.id = userroles.user_id
        ';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Cette fonction est conçue pour récupérer les informations d'un utilisateur spécifique, identifié par son id.
    public function getUserById($id)
    {
        $sql = '
            SELECT users.id, users.nom, users.prenom, users.email, users.telephone, userroles.role, users.image_name
            FROM users
            LEFT JOIN userroles ON users.id = userroles.user_id
            WHERE users.id = ?
        ';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Cette fonction est conçue pour mettre à jour les informations d'un utilisateur dans une base de données.
    public function updateUser($id, $nom, $prenom, $email, $telephone, $role, $nomImage)
    {
        try {
            $stmt = $this->pdo->prepare('UPDATE users SET nom = ?, prenom = ?, email = ?, telephone = ?, image_name = ? WHERE id = ?');
            $stmt->execute([$nom, $prenom, $email, $telephone, $nomImage, $id]);

            $stmt = $this->pdo->prepare('UPDATE userroles SET role = ? WHERE user_id = ?');
            $stmt->execute([$role, $id]);

            return "Utilisateur mis à jour avec succès.";
        } catch (PDOException $e) {
            return "Erreur : " . $e->getMessage();
        }
    }

    // Cette fonction est conçue pour supprimer les informations d'un utilisateur dans une base de données par son ID.
    public function deleteUser($id){
        try{
            //On supprime d'abord le rôle associé à l'utilisateur
            $stmt = $this->pdo->prepare('DELETE FROM userroles WHERE user_id = ?');
            $stmt->execute([$id]);

            //On supprime l'utilisateur
            $stmt = $this->pdo->prepare('DELETE FROM users WHERE id = ?');
            $stmt->execute([$id]);
            return "Utilisateur supprimé avec succès.";
        }catch (PDOException $e) {
            return "Erreur : " . $e->getMessage();
        }
    }

    // Cette fonction est conçue créer les informations d'un utilisateur dans une base de données.

    public function addUser($nom, $prenom, $email, $telephone, $role, $nomImage, $pwd) {
        try {
            $stmt = $this->pdo->prepare('INSERT INTO users (nom, prenom, email, telephone, nomImage, pwd) VALUES (?, ?, ?, ?, ?, ?)');
            $stmt->execute([$nom, $prenom, $email, $telephone, $nomImage, password_hash($pwd, PASSWORD_DEFAULT)]);
            
            $userId = $this->pdo->lastInsertId();

            $stmt = $this->pdo->prepare('INSERT INTO userroles (user_id, role) VALUES (?, ?)');
            $stmt->execute([$userId, $role]);

            return "Utilisateur ajouté avec succès.";
        } catch (PDOException $e) {
            return "Erreur : " . $e->getMessage();
        }
    }
}
