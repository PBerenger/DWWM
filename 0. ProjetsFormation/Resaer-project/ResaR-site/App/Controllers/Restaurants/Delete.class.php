<?php
namespace App\Controllers\Player;

use App\Config\DbConnect;
use App\Models\{User, Player};
use Exception;

require_once "../lib/helperFunctions.php";

class Delete
{
    public function execute(?array $getData, ?array $postData)
    {
        // Check if user is admin
        $pdo = DbConnect::getPDO();
        $user = User::checkAdminNew($pdo, $_SESSION["USER_ID"] ?? null);

        try {
            $id = (int) ($getData["id"] ?? null);
            $player = new Player();
            $player->setPDO($pdo);
            $player->setPlayerInfoById($id);

            if (isset($postData["id"])) {
                $id = (int) $postData["id"];
                $player->deletePlayer();
                $_SESSION["successMessage"] = "La run a été supprimée avec succès.";

                header("Location: /athletes");
                exit();
            }

            require __DIR__ . "/../../Views/Athlete/athleteDelete.php";
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
