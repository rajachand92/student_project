<?php 
//require_once("includes/session_check.php");
	require("../db/database.php");
	require("../classes/studentclass.php");
	
	$obj = new Studentclass();
	
	$obj->email = mysql_real_escape_string($_POST['email']);
	$obj->password = mysql_real_escape_string($_POST['password']);
	
	$result=$obj->studentAuthentication();
	if($result)
	{
		// CREATING SESSION //
		session_start();
		$_SESSION['student_id'] = $obj->student_id;
		$_SESSION['first_name'] = $obj->first_name;
		$_SESSION['lname_name'] = $obj->lname_name;
		$_SESSION['email'] = $obj->email;
		$msg= "login successfully";
	  header("location:../template.php?option=dashboard");	
	  exit;
	}
	else
	{ 
	$msg= "please check your values once ";
	  header("location:../template.php?option=login");	
	  exit;
	}

	
?>

