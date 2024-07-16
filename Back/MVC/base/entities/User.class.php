<?php

require_once __DIR__ . '/../dbconnect/MyDbConnection.php';

class User
{
    public static function createUser($nom, $prenom, $email, $telephone, $password, $role, $image_name)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $pdo = MyDbConnection::getInstance();

        try {
            $stmt = $pdo->prepare('INSERT INTO users (nom, prenom, email, telephone, pwd, image_name) VALUES (?, ?, ?, ?, ?, ?)');
            $stmt->execute([$nom, $prenom, $email, $telephone, $hashedPassword, $image_name]);

            $userId = $pdo->lastInsertId();

            $stmt = $pdo->prepare('INSERT INTO UserRoles (user_id, role) VALUES (?, ?)');
            $stmt->execute([$userId, $role]);

            return "Utilisateur ajouté avec succès.";
        } catch (PDOException $e) {
            return "Erreur : " . $e->getMessage();
        }
    }

    public static function deleteUser($id)
    {
        $pdo = MyDbConnection::getInstance();

        try {
            $stmt = $pdo->prepare('DELETE FROM Users WHERE id = ?');
            $stmt->execute([$id]);
            return "Utilisateur supprimé avec succès.";
        } catch (PDOException $e) {
            return "Erreur : " . $e->getMessage();
        }
    }

    public static function updateUser($id, $nom, $prenom, $email, $telephone, $role, $image_name = null)
    {
        $pdo = MyDbConnection::getInstance();

        try {
            // Mettre à jour les informations de l'utilisateur
            $sql = 'UPDATE Users SET nom = ?, prenom = ?, email = ?, telephone = ?';
            if ($image_name !== null) {
                $sql .= ', image_name = ?';  // Ajouter l'image si elle est fournie
            }
            $sql .= ' WHERE id = ?';

            $params = [$nom, $prenom, $email, $telephone];
            if ($image_name !== null) {
                $params[] = $image_name;
            }
            $params[] = $id;

            $stmt = $pdo->prepare($sql);
            $stmt->execute($params);

            // Mettre à jour le rôle de l'utilisateur
            $stmt = $pdo->prepare('UPDATE UserRoles SET role = ? WHERE user_id = ?');
            $stmt->execute([$role, $id]);

            return "Utilisateur mis à jour avec succès.";
        } catch (PDOException $e) {
            return "Erreur : " . $e->getMessage();
        }
    }

    public static function getUserById($id)
    {
        $pdo = MyDbConnection::getInstance();
        $stmt = $pdo->prepare('SELECT users.*, userroles.role FROM users JOIN userroles ON users.id = userroles.user_id WHERE users.id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public static function getAllUsers()
    {
        $pdo = MyDbConnection::getInstance();
        $stmt = $pdo->prepare('SELECT * FROM users');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getAllUsersWithRoles()
    {
        $pdo = MyDbConnection::getInstance();  // Récupérer l'instance PDO
        $stmt = $pdo->query('SELECT users.id, users.image_name, users.nom, users.prenom, users.email, users.telephone, userroles.role FROM users JOIN userroles ON users.id = userroles.user_id');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
