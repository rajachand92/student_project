	<?php 
	session_start();
	echo'<pre>';
	print_r($_SESSION); exit;
	require '../classes/studentclass.php';
	$student_obj = new student();
	$student_obj->student_id = $_SESSION['student_id'];
	$student_obj->getCourses();
	//var_dump($student_obj->courses); exit;
	?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Untitled Document</title>
	</head>
	
	<body>
	<h2>Student Enrollment:</h2>
	<form action="../executes/stdentenroll.php" method="post">
	<table width="1000" border="0" cellspacing="5" cellpadding="5">
	<tr>
	<td>Select Course</td>
	<td><?php foreach($student_obj->courses as $courses){?><input type="checkbox" name="courses_name[]" id="courses" value="<?php echo $courses['tc_course_id']?>" />
	<label for="courses"><?php echo ' Course Name : <b>'. $courses['tc_course_name'].'</b> FEE Rs. '. $courses['tc_coursse_fee'] .' Duration: '. $courses['tc_course_duration'] ?></label>
	<br /><?php }?></td>
	</tr>
	<tr>
	<td>Transaction type</td>
	<td><input type="checkbox" name="tran_type" id="tran_type" value="cash"/>
	<label for="courses">Cash</label>
	<input type="checkbox" name="tran_type" id="tran_type" value="card"/>
	<label for="courses">Card</label></td>
	</tr>
	<tr>
	<td></td>
	<td><input type ="submit" name="submit" value="submit" /></td>
	</tr>
	</table>
	</form>
	
	
	</body>
	</html>