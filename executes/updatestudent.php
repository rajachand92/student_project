<?PHP 
         session_start();
		require("../classes/studentclass.php");
		require_once("../db/database.php");
		$obj = new studentclass();
		$obj->student_id=($_POST['student_id']);
		$obj->first_name=mysql_real_escape_string(($_POST['fname']));
		$obj->last_name=mysql_real_escape_string(($_POST['lname']));
		$obj->ts_dob=mysql_real_escape_string(($_POST['dob']));
		$obj->ts_address=mysql_real_escape_string(($_POST['address']));
		$obj->ts_mobile=mysql_real_escape_string(($_POST['mobile']));	
		
		$res='';
		$res = $obj->updateStudent();
		if($res)
		{
		$msg= "updated successfully";
		header("location:../template.php?option=dashboard");
		exit;
		}
		else
		{ 
		$msg= "check your values once";
		exit;
		}


?>