<?php
require_once "animal.class.php";

// Chien (enfant) fait référence, récupère les méthodes de animal (mère)
class Chien extends Animal{

    public  function parler(){
        return "aboie";
    }
}


?>