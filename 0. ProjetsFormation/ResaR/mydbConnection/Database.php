<?php
require_once __DIR__ . '/db.php';

class MyDbConnection extends DbConnect 
{
    public function __construct() {
        parent::__construct();
    }
}