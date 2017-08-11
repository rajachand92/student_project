	<?php
	
   if($_POST)
   {
	
	require("db/database.php");
	require ('classes/studentclass.php');
	
	$payment = new studentclass();
	if(isset($_POST['courses_name']))
	{
	$payment->getCoursesFee($_POST['courses_name']);
	
		foreach($_POST['courses_name'] as $course_id)
		{
			$payment->amount += $payment->course_fee[$course_id]['tc_fee']; 
		}
	}
	  else
	  {
		
			header('location:studentEnroll.php');exit;
	  }
		//echo'<pre>'; print_r($payment->amount); exit;
}

	?>
	
	<form action="executes/student_enroll.php" method="post">
	<table width="800" border="1" cellspacing="5" cellpadding="5">
	<tr align="left">
	<th>course Name</th>
	<th>course Fee</th>
	<th>course Duration</th>
	<th>select</th>
	</tr>
    
	<?php foreach($_POST['courses_name'] as $course_id){?>
	<tr>
	<td><?php echo $payment->course_fee[$course_id]['tc_course_name']?><input type="hidden" name="courses_name[]" id="courses" value="<?php echo $payment->course_fee[$course_id]['tc_course_id']?>"/></td>
	<td><?php echo $payment->course_fee[$course_id]['tc_fee']?></td>
	<td><?php echo $payment->course_fee[$course_id]['tc_duration']?></td>
	<td>selected</td>
	</tr>
	
	
	<?php }?>
	<tr>
	<td colspan="3">
	Total Amount
	</td>
	<td  align="right">
	<input type="text"  style="border:none" name="total_amount" value="<?php echo $payment->amount ?>" readonly="readonly">
	</td>
	</tr>
	</table><br /><br />
	<table>
	<tr>
	<td>Transaction type</td>
	<td><input type="radio" name="tran_type" id="tran_type" required="required" value="cash" />
	<label for="courses">Cash</label>
	<input type="radio" name="tran_type" id="tran_type" required="required" value="card" />
	<label for="courses">Card</label></td>
	</tr>
	<tr>
	<td></td>
	<td><input type ="submit" name="submit" value="Pay"/></td>
	</tr>
	</table>
	</form>

