<?php 
/*echo 'srikanth';
echo'<pre>'; print_r($_POST); exit;*/
require '../../classes/Admin.php';
$obj = new Admin();
$obj->courseId = $_POST['cid'];
$result = $obj->course_status_update($_POST['status']);
if($result)
{
	echo json_encode(array('success'=>true,'msg'=>'status Changed successfully'));
	exit;
}
else
{
	echo json_encode(array('success'=>false,'msg'=>'something wnet wrong..!'));
	exit;
}

?>