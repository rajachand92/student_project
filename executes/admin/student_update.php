<?php 
//echo '<pre>'; print_r($_POST); exit;
require '../../classes/Admin.php';
require '../../db/database.php';

$obj = new Admin();
if(isset($_POST))
{
	
	$obj->studentFName = mysql_real_escape_string($_POST['studentFName']);
	$obj->studentLName = mysql_real_escape_string($_POST['studentLName']);
	$obj->ts_dob = mysql_real_escape_string($_POST['ts_dob']);
	$obj->mobile = mysql_real_escape_string($_POST['mobile']);
	$obj->address = mysql_real_escape_string($_POST['address']);
	
	//echo '<pre>'; print_r($obj); exit;
	if($obj->studentId != '')
	{
		$result = $obj->studentUpdate();
	}
	else
	{
		$result = $obj->addstudent();
	}
	//echo $obj->errMsg;
	//echo $result; exit;
	if($result)
	{
		$_SESSION['message'] = 'student data updated successfully';
		header('location:../../admin_template.php?option=students');
	}
	else
	{
		$_SESSION['message'] = 'something went wrong';
		header('location:../../admin_template.php?option=student_update');
	}	
}


?>