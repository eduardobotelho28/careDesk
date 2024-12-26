<?php
// logout.php
    session_start();
    session_unset();
    session_destroy();
    header("Location: ../View/src/pages/login.php");
exit;
?>
