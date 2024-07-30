<?php
require_once './Models/MyDbConnection.php';
// DATE_FORMAT(event.eventDate, "%d / %m / %Y")
class CalendrierManager
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = MyDbConnection::getInstance();
    }

    // Cette fonction est conçue pour récupérer des informations sur tous les events présents dans la base de données.
    public function getEvents()
    {
        $sql = '
                SELECT id_event, eventName, eventRegion, eventGender, DATE_FORMAT(eventDate, "%Y / %m / %d - à %H:%i") AS dateForm, phase
                FROM event
                ORDER BY eventDate
            ';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $events = $stmt->fetchAll();

        return $events;
    }


    public function getEventsById($id)
    {
        $sql = '
            SELECT event.id_event, event.eventName, event.eventRegion, event.eventGender, event.eventDate, event.phase
            FROM event
            WHERE id_country = ?
        ';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
}