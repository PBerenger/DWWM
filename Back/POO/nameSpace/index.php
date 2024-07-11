<?php

require_once "./entities/paypal/Paiement.class.php";
require_once "./entities/stripe/Paiement.class.php";

use \Entities\Paypal\{Paiement as paypalPaiement, Envoyer} ;
// use \Entities\Paypal\Envoyer as envoyerPaiement;
use \entities\stripe\Paiement as stripePaiement;

$paiementPaypal = new paypalPaiement();
$envoyerPaiement = new Envoyer();
$paiementStripe = new stripePaiement();

var_dump($paiementPaypal);
var_dump($envoyerPaiement);

var_dump($paiementStripe);