<?php

// Je demarre une session
session_start();

// Stocker des informations dans la session
$_SESSION ['userName'] = 'Jean';
$_SESSION ['userMail'] = 'jean@gmail.com';

// Accéder aux informations de la session
echo'userName : ' . $_SESSION ['userName'] . "<br>";
echo'userMail : ' . $_SESSION ['userMail'] . "<br>";

// Vérifier si une session est active
if (isset($_SESSION ["userName"])) {
    echo "L'utilisateur ". "\"" . $_SESSION ["userName"] . "\"" . " est connecté." . "<br>";
}else{
    echo "L'utilisateur n'est pas connecté : ";
}

// Supprimer une variable d'une session
unset($_SESSION ["userName"]);

// Detruire une session complete
$_SESSION = [];

// Détruire le cookie de session
if(ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(),"", time() -0,
    $params["path"], $params["domain"],
    $params["secure"], $params["httponly"],
);
}
session_destroy();



// Pour mettre les informations de la session en tableau simple
session_start();
$tableau = array("toto","tutu","titi");
 
$_SESSION['tableau'] = $tableau;
echo '<br/>Contenu de $_SESSION[\'tableau\']:<pre>'.print_r($_SESSION['tableau'],TRUE).'</pre>';
 
$tableau = $_SESSION['tableau'];
echo '<br/>Contenu de $tableau:<pre>'.print_r($tableau,TRUE).'</pre>';

?>