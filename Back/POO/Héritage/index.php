<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
<?php
require_once "chien.class.php";

$chien = new Chien("Rex ");
Echo $chien->nom . $chien->parler() . ". <br>";

?>
    
</body>
</html>
