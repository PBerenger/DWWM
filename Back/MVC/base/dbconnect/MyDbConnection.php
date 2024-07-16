<?php

// cette page sert à récupérer les données de 'dbconnect' (héritage). L'utilisateur passera par cette page donc elle est sécurisée car ne verra pas 'dbconnect'.
require 'dbConnect.php';

class MyDbConnection extends DbConnect {
   
}
