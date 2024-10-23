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
        $sql = 'SELECT 
                        users.id_user, 
                        users.userLastName, 
                        users.userFirstName, 
                        users.userEmail, 
                        DATE_FORMAT(users.userDateBirth, "%d / %m / %Y") AS birthDay, 
                        users.userGender, 
                        users.UserPhone, 
                        userroles.role_id, 
                        serroles.roleDescription, 
                        users.image_name
                    FROM 
                        users
                    JOIN 
                        userroles 
                        ON 
                        users.role_id = userroles.role_id
                    ORDER BY 
                        role_id, userLastName, 
                        userFirstName
        ';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $users = $stmt->fetchAll();

        return $users;
    }

    // Cette fonction est conçue pour récupérer les informations d'un utilisateur spécifique, identifié par son id.
    public function getUserById($id)
    {
        $sql = 'SELECT 
                        users.id_user, 
                        users.userLastName, 
                        users.userFirstName, 
                        users.userEmail, 
                    DATE_FORMAT(users.userDateBirth, "%d / %m / %Y") AS birthDay, 
                        users.userGender, 
                        users.UserPhone, 
                        userroles.role_id, 
                        users.image_name
                    FROM 
                        users
                    JOIN 
                        userroles 
                            ON 
                        users.role_id = userroles.role_id
                    WHERE 
                        users.id_user = :id
        ';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    // Cette fonction est conçue pour mettre à jour les informations d'un utilisateur dans la base de données.
    public function updateUser($id, $nom, $prenom, $email, $dateNaissance, $genre,  $telephone, $role, $nomImage, $pwd)
    {
        $role_id = $role === 'admin' ? 1 : 2;
        try {
            $stmt = $this->pdo->prepare('UPDATE 
                                            users 
                                        SET 
                                            userLastName = :lastName, 
                                            userFirstName = :firstName, 
                                            userEmail = :email, 
                                            userPassword = :pwd, 
                                            userDateBirth = :dateNaissance, 
                                            userGender = :gender, 
                                            UserPhone = :phone, 
                                            role_id = :role, 
                                            image_name = :img
                                        WHERE 
                                            id_user = :id
            ');
            $stmt->bindValue(':lastName', $nom, PDO::PARAM_STR);
            $stmt->bindValue(':firstName', $prenom, PDO::PARAM_STR);
            $stmt->bindValue(':email', $email, PDO::PARAM_STR);
            $stmt->bindValue(':pwd', $pwd, PDO::PARAM_STR);
            $stmt->bindValue(':dateNaissance', $dateNaissance, PDO::PARAM_STR);
            $stmt->bindValue(':gender', $genre, PDO::PARAM_STR);
            $stmt->bindValue(':phone', $telephone, PDO::PARAM_STR);
            $stmt->bindValue(':role', $role_id, PDO::PARAM_INT);
            $stmt->bindValue(':img', $nomImage, PDO::PARAM_STR);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);

            $stmt->execute();

            return "Utilisateur mis à jour avec succès.";
        } catch (PDOException $e) {
            $_SESSION['error'] = "Erreur : " . $e->getMessage();
        }
    }

    // Cette fonction est conçue pour supprimer les informations d'un utilisateur dans une base de données par son ID.
    public function deleteUser($id)
    {
        try {
            $stmt = $this->pdo->prepare('DELETE FROM users WHERE id_user = :id');
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return "Utilisateur supprimé avec succès.";
        } catch (PDOException $e) {
            return "Erreur : " . $e->getMessage();
        }
    }

    // Cette fonction est conçue pour créer les informations d'un utilisateur dans une base de données.
    public function addUser($nom, $prenom, $email, $dateNaissance, $genre, $telephone, $role, $nomImage, $pwd)
    {
        $role_id = $role === 'admin' ? 1 : 2;
        try {
            $stmt = $this->pdo->prepare('INSERT INTO 
                                            users (
                                                userLastName, 
                                                userFirstName, 
                                                userEmail, 
                                                userPassword, 
                                                userDateBirth, 
                                                UserPhone, 
                                                userGender, 
                                                role_id, 
                                                image_name)  
                                        VALUES (
                                                :lastName, 
                                                :firstName, 
                                                :email, 
                                                :pwd, 
                                                :dateNaissance, 
                                                :phone, 
                                                :gender, 
                                                :role, 
                                                :img)
            ');
            $stmt->bindValue(':lastName', $nom, PDO::PARAM_STR);
            $stmt->bindValue(':firstName', $prenom, PDO::PARAM_STR);
            $stmt->bindValue(':email', $email, PDO::PARAM_STR);
            $stmt->bindValue(':pwd', $pwd, PDO::PARAM_STR);
            $stmt->bindValue(':dateNaissance', $dateNaissance, PDO::PARAM_STR);
            $stmt->bindValue(':phone', $telephone, PDO::PARAM_STR);
            $stmt->bindValue(':gender', $genre, PDO::PARAM_STR);
            $stmt->bindValue(':role', $role_id, PDO::PARAM_INT);
            $stmt->bindValue(':img', $nomImage, PDO::PARAM_STR);

            $stmt->execute();

            return "Utilisateur ajouté avec succès.";
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }
}
