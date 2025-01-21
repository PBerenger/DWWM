<?php
require_once __DIR__ . '/dbConnect.php';

class MyDbConnection extends DbConnect 
{
    public function __construct() {
        parent::__construct();
    }
}