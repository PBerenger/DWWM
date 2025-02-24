<?php

session_start();
session_unset();
session_destroy();
header("Location: ?page=home"); // Rediriger vers la page d'accueil après la déconnexion
exit;