	<?php
	if(isset($_GET['student_id'])){
		$obj = new Admin();
	$obj->studentId = $_GET['student_id'];
	$result = $obj->getStudentdata();

	}
	?>
	<div class="col-md-10">
	<h2><?php echo (isset($_GET['student_id']))?'Update':'ADD';?> student: </h2>
	<form action="executes/admin/student_update.php" method="post" >
	<div class="form-group col-md-12">
	<div class="col-md-3">
	<label>First name : </label>
	</div>
	<div class="col-md-5">
	<input type="text" name="studentFName" class="form-control"  value="<?php echo $obj->student[$_GET['student_id']]['ts_first_name']?>" required>
	<input type="hidden" name="studentId" value="<?php echo $obj->student[$_GET['student_id']]['ts_student_id']?>">
	</div>
	</div>
	<div class="form-group  col-md-12">
	<div class="col-md-3">
	<label>studentLName : </label>
	</div>
	<div class="col-md-5">
	<input type="text" name="studentLName" class="form-control" value="<?php echo $obj->student[$_GET['student_id']]['ts_last_name']?>" required>
	</div>
	</div>
	<div class="form-group  col-md-12">
	<div class="col-md-3">
	<label>student date of birth : </label>
	</div>
	<div class="col-md-5">
	<input type="date" name="ts_dob" class="form-control" value="<?php echo $obj->student[$_GET['student_id']]['ts_dob']?>" required>
	</div>
	</div>
	
	<div class="form-group col-md-12">
	<div class="col-md-3">
	<label>mobile : </label>
	</div>
	<div class="col-md-5">
	<input type="text" name="mobile" class="form-control"  value="<?php echo $obj->student[$_GET['student_id']]['ts_mobile'];?>" required>
	</div>
	</div>
	<div class="form-group col-md-12">
	<div class="col-md-3">
	<label>address: </label>
	</div>
	<div class="col-md-5">
	<input type="text" name="address" class="form-control"  value="<?php echo $obj->student[$_GET['student_id']]['ts_address'];?>" required>
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