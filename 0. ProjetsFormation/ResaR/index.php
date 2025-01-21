<?php
session_start();
ob_start();
require_once './Controllers/router.php';
$content = ob_get_clean();
require_once __DIR__ . "/views/template.php";