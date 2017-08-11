<?php 
//echo '<pre>'; print_r($_POST); exit;
require '../../classes/Admin.php';
require '../../db/database.php';

$obj = new Admin();
if(isset($_POST))
{
	$obj->courseId =mysql_real_escape_string($_POST['courseId']);
	$obj->courseName = mysql_real_escape_string($_POST['courseName']);
	$obj->coursefee = mysql_real_escape_string($_POST['courseFee']);
	$obj->courseduration = mysql_real_escape_string($_POST['courseDuration']);
	//echo '<pre>'; print_r($obj); exit;
	if($obj->courseId != '')
	{
		$result = $obj->updateCourse();
	}
	else
	{
		$result = $obj->addCourse();
	}
	//echo $obj->errMsg;
	//echo $result; exit;
	if($result)
	{
		$_SESSION['message'] = 'Course updated successfully';
		header('location:../../admin_template.php?option=courses');
	}
	else
	{
		$_SESSION['message'] = 'something went wrong';
		header('location:../../admin_template.php?option=courses');
	}	
}


?>