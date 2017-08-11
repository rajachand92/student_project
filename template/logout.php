<?php
	session_start();
	session_destroy();

	header("location:../executes/logout.php");	
	exit;
	
 ?>
