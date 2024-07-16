<?php
require_once './Models/MyDbConnection.php';

class UserManager {
    private $pdo;

    public function __construct() {
        $this->pdo = MyDbConnection::getInstance();
    }

    public function getAllUsers() {
        $sql = '
            SELECT users.id, users.nom, users.prenom, users.email, users.telephone, userroles.role, users.nomImage
            FROM users
            LEFT JOIN userroles ON users.id = userroles.user_id
        ';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUserById($id) {
        $sql = '
            SELECT users.id, users.nom, users.prenom, users.email, users.telephone, userroles.role, users.nomImage
            FROM users
            LEFT JOIN userroles ON users.id = userroles.user_id
            WHERE users.id = ?
        ';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateUser($id, $nom, $prenom, $email, $telephone, $role, $nomImage) {
        try {
            $stmt = $this->pdo->prepare('UPDATE users SET nom = ?, prenom = ?, email = ?, telephone = ?, nomImage = ? WHERE id = ?');
            $stmt->execute([$nom, $prenom, $email, $telephone, $nomImage, $id]);

            $stmt = $this->pdo->prepare('UPDATE userroles SET role = ? WHERE user_id = ?');
            $stmt->execute([$role, $id]);

            return "Utilisateur mis à jour avec succès.";
        } catch (PDOException $e) {
            return "Erreur : " . $e->getMessage();
        }
    }
}
