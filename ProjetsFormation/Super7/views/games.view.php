<?php ob_start();?>


<h1>Aller au boulot feignant !!!</h1>

<?php
$content = ob_get_clean();
require_once __DIR__ . "/template.php";
?>