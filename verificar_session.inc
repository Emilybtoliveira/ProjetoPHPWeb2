<?php
 session_start();
 if (!isset($_SESSION['login']) || isset($_GET['logout'] )) {
    session_destroy();
    unset($_SESSION['login']);
    header("location: login.html");
 }
?>
