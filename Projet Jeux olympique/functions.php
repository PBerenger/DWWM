<?php

// Fonction pour afficher des alertes en utilisant JavaScript
function phpAlert($msg) {
    // Assurez-vous que le message est correctement échappé pour éviter les problèmes de sécurité
    $safe_msg = htmlspecialchars($msg, ENT_QUOTES, 'UTF-8');
    // Utilisez json_encode pour gérer les guillemets et les caractères spéciaux correctement
    echo '<script type="text/javascript">alert(' . json_encode($safe_msg) . ');</script>';
}

// Fonction de vérification du mot de passe
function verifyPassword($password) {
    if (strlen($password) < 8) {
        return "Le mot de passe doit contenir au moins 8 caractères.";
    }
    if (!preg_match('/[a-z]/', $password)) {
        return "Le mot de passe doit contenir au moins une lettre minuscule.";
    }
    if (!preg_match('/[A-Z]/', $password)) {
        return "Le mot de passe doit contenir au moins une lettre majuscule.";
    }
    if (!preg_match('/\d/', $password)) {
        return "Le mot de passe doit contenir au moins un chiffre.";
    }
    if (!preg_match('/[^a-zA-Z\d]/', $password)) {
        return "Le mot de passe doit contenir au moins un caractère spécial.";
    }
    return true;
}

//=======================================================================================
//la fonction du dessus peut être aussi ecrite comme ça (pour des majuscules, minuscules et chiffres):

// if(!preg_match("/(([a-z][0-9])|([0-9][a-z])|[A-Z][0-9]|([0-9][A-Z]))/",$motdepasse))
// {
// $message .= "- Le mot de passe doit comporter des lettres et des chiffres.<br/>";
// }
//=======================================================================================