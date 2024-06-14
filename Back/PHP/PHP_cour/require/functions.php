<?php
function phpAlert($msg) {
    $safe_msg = htmlspecialchars($msg, ENT_QUOTES, 'UTF-8');
    echo '<script type="text/javascript">alert(' . json_encode($safe_msg) . ');</script>';
}


?>