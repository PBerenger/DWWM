<?php

class Bonjour {

    const MA_CONSTANTE = "Bonjour";

    // Méthode
    public function afficherMaConstante() {
        echo self::MA_CONSTANTE;
    }

}

// appel de la constante
$instance = new Bonjour();
$instance->afficherMaConstante();

?>