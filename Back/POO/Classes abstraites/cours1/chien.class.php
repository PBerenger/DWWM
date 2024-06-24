<?php

require_once "animal.class.php";

class Chien extends Animal {
    public function faireDuBruit(){echo $this->nom . "fait WAF<br>";}
}

?>