<?php

class Manager extends Employe {
    private $employes = [];

    public function __construct($nom, $salaire, array $employes = []) {
        parent::__construct($nom, $salaire);
        $this->employes = $employes;
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
