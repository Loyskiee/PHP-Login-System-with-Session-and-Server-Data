<?php
/*
Destroy session

Redirect to login*/

    session_start();
    
    session_destroy();

    $_SESSION =[];
    
    header("Location: login.php");
    exit();
?>