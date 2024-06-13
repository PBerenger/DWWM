<?php
if(session_status()==PHP_SESSION_NONE)session_start();
//ou
// if(session_status()==PHP_SESSION_NONE){
//     session_start();
// }

require_once 'dbConnect.php';
function estAdmin($userId)  {
    $pdo = getPDOConnection();
    // Préparation de la requete SQL
    $stmt = $pdo->prepare('SELECT role FROM userRoles WHERE user_id = ?');
    // Execution de la requête
    $stmt->execute([$userId]);
    // Récupération du résultat
    $userRoles = $stmt->fetch();

    // Vérification du rôle    
    return $userRoles && $userRoles['role'] === 'admin';
}

function verifAdmin() {
    if(!isset($_SESSION['user_id'])) {
        echo'Session non définie.';
        exit();
    }else{
        $userId = $_SESSION['user_id'];
        if(!estAdmin($userId)) {
            echo"L'utilisateur $userId n'est pas administrateur";
            exit();
        }
    }
}



?>