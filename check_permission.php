<?php 
    require_once("config/Database.php");
    session_start();
    if($_SESSION["userRole"] != 1) {
        header("Location: 403.php");
    }
?>