<?php
	session_start();
	$_SESSION['message'] = 'Feature coming soon';
	header('location: cart.php');
?>