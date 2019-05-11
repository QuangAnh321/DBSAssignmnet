<?php 
    session_start();
    session_destroy();
    unset($_SESSION['username']);
    $_SESSION['message'] = "You have logged out";
    header("location: index.php");
?>