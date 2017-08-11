<?php 

session_start();
session_destroy();
 $_SESSION = array();
header("location:views/admin/index.php");	
exit;

?>