<?php
session_start();
session_destroy();
header('Location: ../entities/Login.class.php');
exit();

