<?php 
require_once("includes/session_check.php");
//print_r($_SESSION); exit;
//echo'<pre>'; print_r($_POST); exit;

require("../db/database.php");
require '../classes/studentclass.php';
$sdt_reg = new studentclass();
$sdt_reg->student_id = mysql_real_escape_string($_SESSION['student_id']);
$sdt_reg->course_id =mysql_real_escape_string($_POST['courses_name']);
$sdt_reg->transaction_type = mysql_real_escape_string($_POST['tran_type']);
$sdt_reg->amount =mysql_real_escape_string( $_POST['total_amount']);
//echo '<pre>'; var_dump($sdt_reg); exit;
$result = $sdt_reg->studentEnroll();
   if($result)
   {
	$_SESSION['message'] = "you successfully enrolled courses";
	header('location:../template.php?option=courses');
   }
?>