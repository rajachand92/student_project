<?php 
error_reporting(E_ALL && ~E_NOTICE);
ini_set("display_errors" , 1);

require_once("includes/session_check.php");
require("db/database.php");
require("classes/studentclass.php");
$obj=new studentclass();
//echo '<pre>'; print_r($_SESSION); exit;
$obj->student_id = $_SESSION['student_id'];
$result = $obj->getCourses();
?>
<script>
function validateCourse()
{
	
	var t = document.getElementById('course_ids_js').value;

	var cids = t.split(',');

	
	var flag =0;
	for(var i=0;i<cids.length;i++)
	{
 		if(document.getElementById('courses_'+cids[i]) != null && document.getElementById('courses_'+cids[i]).checked == true)
		{
			flag = 1;
			break;
		}
	}
	
	if(flag == 0)
	{
		alert('Please select atleast one course to enroll');
		return false;
	}
	else
	{
		return true;
	}
}
</script>
<form action="template.php?option=payment" method="post" onsubmit="return validateCourse();" >
<table class="table">
 <tr>
 <th>course Name</th>
 <th>course fee</th>
 <th>course duration</th>
 <th>seletion</th>
 </tr>
	<?php 
    $cr_ids = array();
    foreach($obj->courses as $course)
    {
		$cr_ids[] = $course['course_id'];
    
    ?>
 <tr>
 <td><?php echo $course['course_name']?></td>
  <td><?php echo $course['fee']?></td>
   <td><?php echo $course['duration']?></td>

 <td>
	<?php 
		if($course['enrolled'] == '')
		{
	?>
	<input type="checkbox" name="courses_name[]" id="courses_<?php echo $course['course_id'];?>" value="<?php echo $course['course_id'];?>"/>
	<?php
		}
		else
		{
		echo "Enrolled";
		}
	?>
	</td>
 </tr>
<?php 
	}// Loop end
		
	//print_r($cr_ids);
 
	if($course['enrolled'] == '')
	{
	?>
  <tr>
    <td colspan="2"></td>
    <td colspan="2">
   <!-- <input type ="submit" name="submit" value="submit" />-->
     <input type="submit" name="submit" id="payment_button" value="Save" />
  	</td>
  </tr>
  <?php }?>
</table><br /><br />
<input type="hidden" name="course_ids_js" id="course_ids_js" value="<?php echo implode(',', $cr_ids);?>" />

</form>
