<?php

require_once 'src/controllers/comment/add.php';
require_once 'src/controllers/comment/update.php';
require_once 'src/controllers/homepage.php';
require_once 'src/controllers/post.php';

use Application\Controllers\Comment\Add\AddComment;
use Application\Controllers\Comment\Update\UpdateComment;
use Application\Controllers\Homepage\Homepage;
use Application\Controllers\Post\Post;

try {
    if (isset($_GET['action']) && $_GET['action'] !== '') {
        switch ($_GET['action']) {
            case 'templates/homepage':
                // Inclure le fichier de la page d'accueil
                include 'templates/homepage.php';
                break;

                // Vous pouvez ajouter d'autres cas ici pour d'autres actions
                // case 'templates/otherpage':
                //     include 'templates/otherpage.php';
                //     break;

            default:
                echo "Action non reconnue.";
                break;
        }

        if ($_GET['action'] === 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $identifier = $_GET['id'];
                (new Post())->execute($identifier);
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        } elseif ($_GET['action'] === 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $identifier = $_GET['id'];
                (new AddComment())->execute($identifier, $_POST);
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        } elseif ($_GET['action'] === 'updateComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $identifier = $_GET['id'];
                $input = null;
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $input = $_POST;
                }
                (new UpdateComment())->execute($identifier, $input);
            } else {
                throw new Exception('Aucun identifiant de commentaire envoyé');
            }
        } else {
            throw new Exception("La page que vous recherchez n'existe pas.");
        }
    } else {
        (new Homepage())->execute();
    }
} catch (Exception $e) {
    $errorMessage = $e->getMessage();
    require('templates/error.php');
}
