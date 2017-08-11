	<?php
	//print_r($_GET); exit;
	$obj = new Admin();
	if(isset($_GET['cid'])){
	$obj->courseId = $_GET['cid'];
	$result = $obj->getCoursedata($_GET['cid']);
	//echo '<pre>'; print_r($obj->courses); exit;
	$courses = $obj->courses[$_GET['cid']];
	}
	?>
	
	<div class="col-md-10">
    
	<h2><?php echo (isset($_GET['cid']))?'Update':'ADD';?> Course: </h2>
    
	<?php if(isset($_SESSION['message'])){ echo $_SESSION['message']; unset($_SESSION['message']);}?>
    
	<form action="executes/admin/course_update.php" method="post" >
	<div class="form-group col-md-12">
	<div class="col-md-3">
	<label>Course Name : </label>
	</div>
	<div class="col-md-5">
	<input type="text" name="courseName" class="form-control"  value="<?php echo (isset($courses['courseName']))?$obj->courses[$_GET['cid']]['courseName']:'';?>">
	<input type="hidden" name="courseId" value="<?php echo (isset($_GET['cid']))?$_GET['cid']:'';?>">
	</div>
	</div>
	<div class="form-group  col-md-12">
	<div class="col-md-3">
	<label>CourseFee : </label>
	</div>
	<div class="col-md-5">
	<input type="text" name="courseFee" class="form-control" value="<?php echo (isset($courses['coursefee']))?$obj->courses[$_GET['cid']]['coursefee']:'';?>">
	</div>
	</div>
	<div class="form-group  col-md-12">
	<div class="col-md-3">
	<label>Course Duration : </label>
	</div>
	<div class="col-md-5">
	<input type="text" name="courseDuration" class="form-control" value="<?php echo (isset($courses['courseduration']))?$obj->courses[$_GET['cid']]['courseduration']:''?>">
	</div>
	</div>
	<div class="form-group  col-md-12">
	<div class="col-md-3">
	<label> </label>
	</div>
	<div class="col-md-5">
	<input type="submit" name="submit" value="submit">
	</div>
	</div>
	</form>
	
	
	</div>