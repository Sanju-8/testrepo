<?php
    session_start();
    include("connection.php");
    unset($_SESSION['userId']);
    header("location:login-des.php");
?>

