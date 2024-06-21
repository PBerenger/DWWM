<?php

class Manager {
    private $nom;
    private $salaire;
    private $employes = [];

    public function __construct($nom, $salaire) {
        $this->nom = $nom;
        $this->salaire = $salaire;
    }

    public function ajouterEmploye(Employe $employe) {
        $this->employes[] = $employe;
    }

    public function afficherDetails() {
        echo "Manager:<br><br>" . $this->nom . ", Salaire: " . $this->salaire . "€. <br><br><br>";
        echo "Liste des employés gérés:<br><br>";
        foreach ($this->employes as $employe) {
            $employe->afficherDetails(). "<br>";
        }
    }
}

?>
