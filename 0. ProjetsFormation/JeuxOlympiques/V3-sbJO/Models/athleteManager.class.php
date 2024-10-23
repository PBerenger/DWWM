<?php
require_once './Models/MyDbConnection.php';

class AthletesManager
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = MyDbConnection::getInstance();
    }

    // Cette fonction est conçue pour récupérer des informations sur tous les athlètes présents dans la base de données.
    public function getAllAthletes()
    {
        $sql = '
                SELECT athlete.id_athlete, athlete.athleteLastName, athlete.athleteFirstName, athlete.athleteGender, athlete.athleteDateBirth, athlete.athleteGender, athlete.gold, athlete.silver, athlete.bronze, country.countryName, country.countryShortName
                FROM athlete
                JOIN country ON athlete.id_Country = country.id_country
                ORDER BY athlete.athleteLastName, athlete.athleteFirstName
            ';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $athletes = $stmt->fetchAll();

        return $athletes;
    }


    public function getAthletesById($id)
    {
        $sql = '
            SELECT athlete.id_athlete, athlete.athleteLastName, athlete.athleteFirstName, athlete.athleteGender, athlete.athleteDateBirth, athlete.athleteGender, athlete.gold, athlete.silver, athlete.bronze, country.countryName, country.countryShortName
            FROM athlete
            JOIN country ON athlete.id_Country = country.id_country
            WHERE id_country = ?
        ';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

//-----------------------------------------------------------------------------------------------------------------------------------
    //MODIFIER NOMS !!!
    public function updateUser($id, $nom, $prenom, $email, $dateNaissance, $genre,  $telephone, $role, $nomImage, $pwd)
    {
        $role_id = $role === 'admin' ? 1 : 2;
        try {
            $stmt = $this->pdo->prepare('   UPDATE
                                                users 
                                            SET 
                                                userLastName = ?, userFirstName = ?, userEmail = ?, userPassword = ?, userDateBirth = ?, userGender = ?, UserPhone = ?, role_id = ?,    image_name = ?
                                            WHERE 
                                                id_user = ?');
            $stmt->execute([$nom, $prenom, $email, $pwd, $dateNaissance, $genre, $telephone, $role_id, $nomImage, $id]);

            return "Utilisateur mis à jour avec succès.";
        } catch (PDOException $e) {
            $_SESSION['error'] = "Erreur : " . $e->getMessage();
        }
    }

    // Cette fonction est conçue pour supprimer les informations d'un utilisateur dans une base de données par son ID.
    public function deleteUser($id)
    {
        try {
            $stmt = $this->pdo->prepare('DELETE FROM users WHERE id_user = ?');
            $stmt->execute([$id]);
            return "Utilisateur supprimé avec succès.";
        } catch (PDOException $e) {
            return "Erreur : " . $e->getMessage();
        }
    }
    


    // Cette fonction est conçue créer les informations d'un utilisateur dans une base de données.

    public function addUser($nom, $prenom, $email, $dateNaissance, $genre, $telephone, $role, $nomImage, $pwd)
    {
        $role_id = $role === 'admin' ? 1 : 2;
        try {
            $stmt = $this->pdo->prepare('INSERT INTO 
                                            users (userLastName, userFirstName, userEmail, userPassword, userDateBirth, UserPhone, userGender, role_id, image_name)  
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
            $stmt->execute([
                'lastName' => $nom,
                'firstName' => $prenom,
                'email' => $email,
                'pwd' => $pwd,
                'dateNaissance' => $dateNaissance,
                'phone' => $telephone,
                'gender' => $genre,
                'role' => $role_id,
                'img' => $nomImage
            ]);

            return "Utilisateur ajouté avec succès.";
        } catch (PDOException $e) {
            // return "Erreur : " . $e->getMessage();
            throw new Exception($e->getMessage());
        }
    }
}
