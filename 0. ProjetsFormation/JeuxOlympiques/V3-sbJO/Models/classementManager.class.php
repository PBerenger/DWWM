<?php
require_once './Models/MyDbConnection.php';

class ClassementManager
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = MyDbConnection::getInstance();
    }

    // Cette fonction est conçue pour récupérer des informations sur tous les athlètes présents dans la base de données.
    public function getClassement()
    {
        $sql = '
                SELECT id_athlete, athleteLastName, athleteFirstName
                FROM athlete
                JOIN country ON athlete.id_Country = country.id_country
                ORDER BY athleteLastName, athleteFirstName, country.id_country
            ';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $classement = $stmt->fetchAll();

        return $classement;
    }


    public function getClassementById($id)
    {
        $sql = '
                SELECT id_athlete, athleteLastName, athleteFirstName
                FROM athlete
                JOIN country ON athlete.id_Country = country.id_country
                ORDER BY athleteLastName, athleteFirstName, country.id_country
            WHERE id_country = ?
        ';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
}