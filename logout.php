<?php
    session_start();
    session_unset();
    session_destroy();
    header('location:../frantcode/login.php');
?>