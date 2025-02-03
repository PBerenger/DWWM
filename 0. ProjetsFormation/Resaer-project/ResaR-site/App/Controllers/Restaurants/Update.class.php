<?php
namespace App\Controllers\Player;

use App\Config\DbConnect;
use App\Models\{Country, Player, User};
use Exception;

require_once "../lib/helperFunctions.php";


class Update
{
    public function execute(?array $getData, ?array $postData, ?array $files)
    {
        // Check if user is admin
        $pdo = DbConnect::getPDO();
        $user = new User($pdo);
        if (isset($_SESSION["USER_ID"])) {
            $user->findUserById($_SESSION["USER_ID"]);
        }
        $user->checkAdmin();

        $playerId = $postData["playerId"] ?? $getData["id"] ?? null;
        // If the id key isn't set, throw an exception
        if (!$playerId) {
            throw new Exception("L'id pour la modification n'a pas été fourni");
        }

        $player = new Player();
        $player->setPDO($pdo);
        $player->setPlayerInfoById($playerId);

        $countries = Country::getAllCountries($pdo);

        // Update if we have post data
        if (isset($postData["playerId"], $postData["lastName"], $postData["firstName"], $postData["birthYear"], $postData["countryId"])) {
            extract($postData, EXTR_SKIP);


            try {
                $nameCheck = "/^[\p{L}\p{Pd}]+([\ \p{L}\p{Pd}]*)$/u";

                // Verify user inputs 
                if (preg_match($nameCheck, $firstName) === 0) {
                    throw new Exception("Le prénom contient des caractères invalides");
                } else if (preg_match($nameCheck, $lastName) === 0) {
                    throw new Exception("Le nom contient des caractères invalides");
                } else if ($birthYear < date("Y", strtotime("-90 years")) || $birthYear > date("Y", strtotime("-13 years"))) {
                    throw new Exception("L'année de naissance fournie n'est pas autorisée");
                } else if (!Country::countryExists($pdo, $countryId)) {
                    throw new Exception("Le pays n'existe pas dans la base de données");
                }

                // Verify image
                $imagePath = null;

                if (isset($files["imagePath"]) && $files["imagePath"]["name"] !== "") {
                    $target_dir = "assets/img/players/";
                    $target_file = $target_dir . basename($files["imagePath"]["name"]);
                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                    // Add a number to the end of an existing file name
                    $counter = 1;
                    while (file_exists($target_file)) {
                        $target_file = $target_dir . pathinfo($target_file, PATHINFO_FILENAME) . "-" . $counter . "." . $imageFileType;
                        $counter++;
                    }

                    // Check size of the image
                    if ($files["imagePath"]["size"] > 500000) {
                        throw new Exception("La taille de votre fichier est trop grande.");
                    }

                    // Check extension of the image
                    $allowedExtensions = ["png", "jpg", "jpeg"];
                    if (!in_array($imageFileType, $allowedExtensions)) {
                        throw new Exception("L'extension de l'image n'est pas valide.");
                    }

                    if (!move_uploaded_file($files["imagePath"]["tmp_name"], $target_file)) {
                        throw new Exception("Une erreur est survenue lors de l'envoi de l'image.");
                    }

                    $imagePath = basename($target_file);
                }

                // Try to update the db
                $player->update($lastName, $firstName, $birthYear, $countryId, $imagePath);
                $_SESSION["successMessage"] = "L'athlète a été modifié avec succès !";
                
            } catch (Exception $e) {
                $_SESSION["errorMessage"] = $e->getMessage();
            }
        }

        require __DIR__ . "/../../Views/Athlete/athleteUpdate.php";

    }
}