<?php
require_once './Models/athleteManager.class.php';

class AthleteController
{
    private $athleteManager;

    public function __construct()
    {
        $this->athleteManager = new AthleteManager();
    }
}