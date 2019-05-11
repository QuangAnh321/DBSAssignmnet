<?php 
    session_start();
    $_SESSION['message'] = "You have logged out";
    unset($_SESSION['username']);
    header("location: index.php");
    session_destroy();
?>