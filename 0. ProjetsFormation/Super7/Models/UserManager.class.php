<?php
require_once __DIR__ . '/MyDbConnection.php';

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
                users.u_lname,
                users.u_fname,
                users.u_email,
                users.u_password,
                DATE_FORMAT(users.u_date_birth, "%d / %m / %Y") AS birthDay,
                users.u_gender,
                users.u_phone,
                users.u_profil_img,
                questionnaire.questionnaire_id,
                user_roles.id_role,
                user_roles.role_description
            FROM
                users
            JOIN 
                user_roles
                    ON
                users.id_role = user_roles.id_role
            LEFT JOIN
                questionnaire
                    ON
                questionnaire.id_user = users.id_user
            ORDER BY
                id_role, u_lname, u_fname
        ';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $users;
    }

    // Cette fonction est conçue pour récupérer les informations d'un utilisateur spécifique, identifié par son id.
    public function getUserById($id)
    {
        $sql = 'SELECT 
                users.id_user,
                users.u_lname,
                users.u_fname,
                users.u_email,
                users.u_password,
                DATE_FORMAT(users.u_date_birth, "%d / %m / %Y") AS birthDay,
                users.u_gender,
                users.u_phone,
                users.u_profil_img,
                questionnaire.questionnaire_id,
                user_roles.id_role,
                user_roles.role_description
            FROM
                users
            JOIN
                user_roles
                    ON
                users.id_role = user_roles.id_role
            LEFT JOIN
                questionnaire
                    ON
                questionnaire.id_user = users.id_user
            WHERE
                users.id_user = :id_user
        ';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id_user', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Cette fonction est conçue pour mettre à jour les informations d'un utilisateur dans une base de données.
    public function updateUser($id, $nom, $prenom, $email, $dateNaissance, $genre, $telephone, $role, $nomImage, $pwd)
    {
        $role_id = $role === 'admin' ? 1 : 2;
        try {
            $stmt = $this->pdo->prepare('
            UPDATE users 
            SET 
                u_lname = :lname,
                u_fname = :fname,
                u_email = :email,
                u_password = :password,
                u_date_birth = :date_birth,
                u_gender = :gender,
                u_phone = :phone,
                id_role = :role,
                u_profil_img = :profil_img
            WHERE 
                id_user = :id_user');

            $stmt->bindValue(':lname', $nom, PDO::PARAM_STR);
            $stmt->bindValue(':fname', $prenom, PDO::PARAM_STR);
            $stmt->bindValue(':email', $email, PDO::PARAM_STR);
            $stmt->bindValue(':password', $pwd, PDO::PARAM_STR);
            $stmt->bindValue(':date_birth', $dateNaissance, PDO::PARAM_STR);
            $stmt->bindValue(':gender', $genre, PDO::PARAM_STR);
            $stmt->bindValue(':phone', $telephone, PDO::PARAM_STR);
            $stmt->bindValue(':role', $role_id, PDO::PARAM_INT);
            $stmt->bindValue(':profil_img', $nomImage, PDO::PARAM_STR);
            $stmt->bindValue(':id_user', $id, PDO::PARAM_INT);

            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return true;
            } else {
                return "Aucune mise à jour effectuée.";
            }
        } catch (PDOException $e) {
            return "Erreur lors de la mise à jour de l'utilisateur : " . $e->getMessage();
        }
    }

    // Cette fonction est conçue pour supprimer les informations d'un utilisateur dans une base de données par son ID.
    public function deleteUser($id)
    {
        try {
            $stmt = $this->pdo->prepare('DELETE FROM users WHERE id_user = :id_user');
            $stmt->bindValue(':id_user', $id, PDO::PARAM_INT);
            $stmt->execute();
            return "Utilisateur supprimé avec succès.";
        } catch (PDOException $e) {
            return "Erreur : " . $e->getMessage();
        }
    }

    // Cette fonction est conçue créer les informations d'un utilisateur dans une base de données.
    public function addUser($nom, $prenom, $email, $dateNaissance, $genre, $telephone, $role, $nomImage, $pwd)
    {
        $role_id = $role === 'admin' ? 1 : 2;
        $hashed_pwd = password_hash($pwd, PASSWORD_DEFAULT);
        try {
            $stmt = $this->pdo->prepare('INSERT INTO 
                                            users (
                                            u_lname, 
                                            u_fname, 
                                            u_email, 
                                            u_password, 
                                            u_date_birth, 
                                            u_phone, 
                                            u_gender, 
                                            id_role, 
                                            u_profil_img)  
                                        VALUES 
                                            (:lastName,
                                            :firstName,
                                            :email,
                                            :pwd,
                                            :dateNaissance,
                                            :phone,
                                            :gender,
                                            :role,
                                            :img)');
            $stmt->bindValue(':lastName', $nom, PDO::PARAM_STR);
            $stmt->bindValue(':firstName', $prenom, PDO::PARAM_STR);
            $stmt->bindValue(':email', $email, PDO::PARAM_STR);
            $stmt->bindValue(':pwd', $hashed_pwd, PDO::PARAM_STR);
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
