	<?php 
	if($_POST)
	{
	//echo'<pre>'; print_r($_POST); exit;
	require '../classes/student.php';
	$payment = new student();
	$payment->getCoursesFee($_POST['courses_selected']);
	foreach($_POST['courses_selected'] as $course_id)
	{
	$payment->amount += $payment->course_fee[$course_id]['tc_coursse_fee']; 
	}
	
	}
	
	?>
	
	<form action="../executes/studentEnroll.php" method="post">
	<table width="800" border="1" cellspacing="5" cellpadding="5">
	<tr align="left">
	<th>course Name</th>
	<th>course Fee</th>
	<th>course Duration</th>
	<th>select</th>
	</tr>
	<?php foreach($_POST['courses_selected'] as $course_id){?>
	<tr>
	<td><?php echo $payment->course_fee[$course_id]['tc_course_name']?><input type="hidden" name="courses_name[]" id="courses" value="<?php echo $payment->course_fee[$course_id]['tc_course_id']?>"/></td>
	<td><?php echo $payment->course_fee[$course_id]['tc_coursse_fee']?></td>
	<td><?php echo $payment->course_fee[$course_id]['tc_course_duration']?></td>
	<td>selected</td>
	</tr>
	
	
	<?php }?>
	<tr>
	<td colspan="3">
	Total Amount
	</td>
	<td  align="right">
	<?php echo $payment->amount ?>
	</td>
	</tr>
	</table><br /><br />
	<table>
	<tr>
	<td>Transaction type</td>
	<td><input type="radio" name="tran_type" id="tran_type" value="cash" />
	<label for="courses">Cash</label>
	<input type="radio" name="tran_type" id="tran_type" value="card" />
	<label for="courses">Card</label></td>
	</tr>
	<tr>
	<td></td>
	<td><input type ="submit" name="submit" value="Pay" onclick="confirm(are you sure do you want to procced..?);"/></td>
	</tr>
	</table>
	</form>
