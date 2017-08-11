	<?php 
	$obj = new Admin();
	$result = $obj->getStudentdata();
	/*echo '<pre>';print_r($obj->student);
	exit;*/ 
	?>
	<div class="col-md-12">
	<h2>List of Student:</h2>
        <table class="table">
        <tr>
        <td>Student no</td>
        <td>Student Name</td>
        <td>email</td>
        <td>mobile</td>
        <td>Status</td>
        <td>Action</td>
        </tr> 
        
        <?php $i = 0; foreach($obj->student as $key=>$value){?>
        <tr >
        <td><?php echo ++$i;?></td>
        <td><?php echo $value['ts_first_name'].' '. $value['ts_last_name']?></td>
        <td><?php echo $value['ts_email']?></td>
        <td><?php echo $value['ts_mobile']?></td>
        <td class ="td-class" id ='status_<?php echo $i?>' >
        <?php if($value['ts_status'] == 'ACTIVE'){?>
        
        <a class='btn btn-success' id= 'anchor' href = 'javascript:' onclick='status_update(<?php echo $key ?>, 0,<?php echo $i ?>)'>ACTIVE</a>
        <?php }
        else
        {?>
        <a class='btn btn-danger' id= 'anchor' href = 'javascript:' onclick='status_update(<?php echo $key ?>, 1,<?php echo $i ?>)'>INACTIVE</a><?php }?>
        </td>
        
        <td><a href="admin_template.php?option=student_update&student_id=<?php echo $key?>">update</a></td>
        </tr>
        <?php }?>
        </table>
	</div>
	<script>
	function status_update(cid ,status,id)
	{
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
	$('#status_'+id).html("<a class='btn btn-success' href = 'javascript:' onclick='status_update("+cid+", 0)'>ACTIVE</a>");
	}
	else
	{
	$('#status_'+id).html("<a class='btn btn-danger' href = 'javascript:' onclick='status_update("+cid+", 1)'>INACTIVE</a>");
	}
	}
	},
	error: function (request, status, error) {
	alert(request.responseText);
	}		
	});
	}
	
	</script>