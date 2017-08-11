	<?php 
	$obj = new Admin();
	$result = $obj->getCoursedata();
	//echo '<pre>';print_r($obj->courses);
	//exit; 
	?>
	
	<div class="col-md-10">
	<h2>List of Courses:</h2>
	<table class="table">
	<tr>
	<td>S.No</td>
	<td>Course Name</td>
	<td>Course Fee</td>
	<td>Course Duration</td>
	<td>Status</td>
	<td>Actions</td>
	</tr>
	<?php 
	$i = 0; 
	foreach($obj->courses as $key => $value)
	{
	?> 
        <tr >
        <td><?php echo ++$i;?></td>
        <td><?php echo $value['courseName']?></td>
        <td><?php echo $value['coursefee']?></td>
        <td><?php echo $value['courseduration']?></td>
        <td class ="td-class" id ='status_<?php echo $i?>' >
        <?php
	if($value['course_sttus'] == 'ACTIVE')
	{
	?>
	<a class='btn btn-success' id= 'anchor' href = 'javascript:' onclick="status_update('<?php echo $key;?>', '0' , '<?php echo $i;?>' , '<?php echo $value['course_name']?>')" >ACTIVE</a>
	<?php
	}
	else
	{
	?>
	<a class='btn btn-danger' id= 'anchor' href = 'javascript:' onclick="status_update('<?php echo $key;?>', '1','<?php echo $i;?>' , '<?php echo $value['course_name']?>')" >INACTIVE</a>
	<?php
	}
	?>
	</td>
	<td><a href="admin_template.php?option=course_update&cid=<?php echo $key?>">update</a></td>
	</tr>
	<?php
	} // End loop
	?>
	</table>
	</div>
	<script>
	function status_update(cid ,status,id , cname)
	{
	var status_label = 'ACTIVE';
	if(status == '0')
	status_label = 'INACTIVE';
	
	var cf = confirm('Please confirm to change the '+cname+' status to '+status_label);
	if(!cf) return;
	
	$.ajax({
	type:'POST',
	url:'executes/admin/course_status_update.php',
	dataType:"json",
	data:'cid='+cid+'&status='+status,
	success:function(data)
	{
	if(data.msg)
	{
		if(status == 1)
		{
			$('#status_'+id).html("<a class='btn btn-success' onclick=\"status_update('"+cid+"', '0' , '"+id+"', '"+cname+"');\">ACTIVE</a>");
		}
		else
		{
			$('#status_'+id).html("<a class='btn btn-danger' onclick=\"status_update('"+cid+"', '1' , '"+id+"' , '"+cname+"');\">INACTIVE</a>");
		}
	}
	},
	error: function (request, status, error) {
	alert(request.responseText);
	}		
	});
	}
	</script>