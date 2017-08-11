	<?php 
	session_start();
	require("../classes/studentclass.php");
	require_once("../db/database.php");
	if(!isset($_SESSION['student_id']))
	
	$std_obj= new studentclass();
	$std_obj->student_id = $_SESSION['student_id'];
	$std_obj->getCourses();
	
	print "<pre>";
    print_r($std_obj->tc_courses);
	?>
	<h3>Select Courses</h3>
	<form action="template.php?option=payment" method="post">
	<table class="table">
	<tr align="left">
	<th>course Name</th>
	<th>course Fee</th>
	<th>course Duration</th>
	<th>select</th>
	</tr>
	<?php foreach($std_obj->tc_courses as $courses){?>
	<tr>
	<td><?php echo $courses['course_name']?></td>
	<td><?php echo $courses['fee']?></td>
	<td><?php echo $courses['duration']?></td>
	<td>
	<?php 
	if($courses['enrolled'] == '')
	{
	?>
	<input type="checkbox" name="courses_selected[]" id="courses" value="<?php echo $courses['course_id'];?>"/>
	<?php
	}
	else
	{
	echo "Enrolled";
	}
	?>
	?>
    </td>
  </tr>
   
  <?php }?>
  <?php 
	if($courses['enrolled'] == '')
	{
	?>
  <tr>
    <td colspan="2"></td>
    <td colspan="2">
   <!-- <input type ="submit" name="submit" value="submit" />-->
     <input type="button" name="submit" id="payment_button" value="Save" />
  	</td>
  </tr>
  <?php }?>
</table><br /><br />

</form>
