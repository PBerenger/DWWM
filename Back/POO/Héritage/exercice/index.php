<?php

require_once "Employe.class.php";
require_once "Manager.class.php";

$manager = new Manager("Bob",70000);

$employe1 = new Employe("Alice", 50000);
$employe2 = new Employe("Jocelyne", 2500);

$manager->ajouterEmploye($employe1);
$manager->ajouterEmploye($employe2);

$manager->afficherDetails();

?>