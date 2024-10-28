<?php

class boardGamesManager
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = MyDbConnection::getInstance();
    }

    public function getSkills()
    {
        $stmt = $this->pdo->prepare('SELECT * FROM games_board_game');
        $stmt->execute();
        $skills = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if (isset($row['id_skill']) && isset($row['s_skills'])) {
                $skills[$row['id_skill']] = $row['s_skills'];
            }
        }
        return $skills; // Renvoyer toutes les compétences récupérées
    }



    public function getBoardGames()
    {
        $stmt = $this->pdo->prepare('SELECT 
                                id_games_bg, 
                                bg_name, 
                                bg_skills, 
                                bg_max_players, 
                                bg_duration, 
                                bg_likes 
                                FROM 
                                games_board_game');

        $stmt->execute();
        $boardG = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $boardG[$row['id_games_bg']] = [
                'bg_name' => $row['bg_name'],
                'bg_skills' => $row['bg_skills'],
                'bg_max_players' => $row['bg_max_players'],
                'bg_duration' => $row['bg_duration'],
                'bg_likes' => $row['bg_likes']
            ];
        }
        return $boardG; // Renvoyer tous les jeux de plateau
    }
}
