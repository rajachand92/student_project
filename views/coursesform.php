<?php 
require("../db/database.php");
require("../classes/studentclass.php");echo'<pre>';
print_r($_SESSION); exit;
$obj=new student();
$obj->student_id = 
$result = $obj->getCourses();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form action="../executes/courses.php" method="post" >
<table width="500" border="1">
 <tr>
 <th>course Name</th>
 <th>course fee</th>
 <th>course duration</th>
 <th>selection</th>
 </tr>
 <?php foreach($obj->tc_course as $course){?>
 <tr>
 <td><?php echo $course['cname']?></td>
  <td><?php echo $course['fee']?></td>
   <td><?php echo $course['duration']?></td>
    <td><input type="checkbox" name="courses_name[]" id="courses" value="<?php echo $courses['tc_course_id']?>" /></td>
 
 </tr>
 <?php }?>
 <tr>
 <td><input type="submit" value="submit" /></td>
 </tr>
</table>
</form>
</body>
</html>