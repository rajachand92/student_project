<?php 
//echo "<pre>";
//print_r($_POST);
//exit;
require_once("../db/database.php");
require("../classes/studentclass.php");

if(isset($_POST['submit']))
{
	
	$obj=new Studentclass();
	$obj->first_name = mysql_real_escape_string($_POST['fname']);
	$obj->last_name = mysql_real_escape_string($_POST['lname']);
	$obj->ts_dob = mysql_real_escape_string($_POST['dob']);
	$obj->email = mysql_real_escape_string($_POST['email']);
	$obj->ts_gender = mysql_real_escape_string($_POST['gender']);
	$obj->ts_mobile = mysql_real_escape_string($_POST['mobile']);
	$obj->ts_address = mysql_real_escape_string($_POST['address']);
	$obj->password = mysql_real_escape_string($_POST['password']);
	
	$result = '';
	$result = $obj->createStudent();
	//echo $obj->error_info;
	//var_dump($result);
	//exit;
	if($result)	
	{
	  header("location:../template.php?option=login");	
	  exit;
	}
	else 
	{
	  header("location:template.php");	
	  exit;
	}
	exit;
	
}

?>