<?php 
     session_start();
    require("classes/studentclass.php");
	require_once("db/database.php");
	if(!isset($_SESSION['student_id']))
	
	$std_obj= new studentclass();
	$std_obj->student_id = $_SESSION['student_id'];
    $std_obj->getData();

?>
<script>
$(document).ready(function(){
	
 	$('#payment_button').click(function(){
		//alert('ji');
		var flag = 0;
 		$("input[id^='courses_']").each(function() {
            if($(this).is(":checked"))
			{
				flag = 1;
 			}
        });
		
		if(flag == 1)
		{
			
			$.ajax({
			type:'post',
			url:'../template/payment.php',
			dataType:"html",
			data:$('.courses_selected:checked').serialize(),
			success:function(msg)
			{
				//alert(msg);
				$('.payment_div').html(msg);
			},
			error: function (request, status, error) {
			alert(request.responseText);
			 }		
			});
		}
		else
		{
			alert('Please select atleast one course.');
		}
		
		});
	
	});
</script>