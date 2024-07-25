<?php
require_once './Models/MyDbConnection.php';

//POUR AFFICHER LA DATE EVENEMENT
// DATE_FORMAT(athleteDateBirth, "%d / %m / %Y - %H:%i")
class AthleteManager
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = MyDbConnection::getInstance();
    }

    // Cette fonction est conçue pour récupérer des informations sur tous les utilisateurs présents dans la base de données.
    public function getAllAthletes()
    {
        $sql = '
                SELECT id_athlete, athleteLastName, athleteFirstName, athleteGender, athleteDateBirth, athleteGender, gold, silver, bronze, id_country
                FROM athlete
                JOIN userroles ON users.role_id = userroles.role_id
                ORDER BY role_id, userLastName, userFirstName
            '; //faire le joind et order by
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $users = $stmt->fetchAll();

        return $users;
    }
}
