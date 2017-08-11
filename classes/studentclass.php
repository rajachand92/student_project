<?php 

  class studentclass
  {
	  
    public $student_id=''; 	
	public $first_name ='';  
    public $last_name ='';  
	public $ts_dob ='';  	
	public $email ='';  	  
    public $ts_gender  ='';
	public $ts_mobile  ='';  	  
	public $ts_address  ='';
	public $password =''; 	
	public $ts_created_date =''; 	
	public $ts_created_time =''; 	
	public $ts_update_date =''; 	
	public $ts_updated_time =''; 	
	public $ts_status =''; 
	public $tc_course = array();
	public $tc_fee='';
	public $transaction_uid;
	public $transaction_id;
	public $amount;
	public $transaction_type;
	public $tc_duration='';	
	public $course_id = array();
	
	public $ip_address;
	
	public $error_info;// To indicate errors of logic 
	
	/*
	  this  setStudentValues() is for setting values like $student_id,$first_name,$last_name .....etc
	*/
	public function createStudent()
	{
		$sql="INSERT INTO tbl_student SET 
		ts_first_name='".$this->first_name."',
		ts_last_name='".$this->last_name."',
		ts_dob ='".$this->ts_dob."',
		ts_mobile='".$this->ts_mobile."',
		ts_email ='".$this->email."',
		ts_gender   ='".$this->ts_gender."',
		ts_address    ='".$this->ts_address."',
		ts_password  ='".$this->password."',
		ts_created_date =CURRENT_DATE ,
		ts_created_time  =TIME(NOW())
		";
		
		//echo $sql.'<br />';
 		mysql_query($sql);
		
		$this->error_info = mysql_error();
		
		if(mysql_insert_id())
			return true;
		else
		{
 			return false;
		}
		
	} // Function End
	
	/* updating student details */
				  
	public function updateStudent()
	{
 		$sql=" UPDATE tbl_student SET
		ts_first_name='".$this->first_name."',
		ts_last_name='".$this->last_name."',
		ts_dob ='".$this->ts_dob."',
		ts_mobile='".$this->ts_mobile."',
		ts_address    ='".$this->ts_address."',
		ts_update_date =CURRENT_DATE ,
		ts_updated_time  =TIME(NOW()),
		ts_status='".$this->ts_status."'
		
		WHERE ts_student_id='".$this->student_id."'
		";
			  
		$res=mysql_query($sql);
		
		if($res)
			return true;
		else
		{
			return false;	  
		}
	  
		  
	} // Function END
	
	/*
	checking student authentication with help of email and password
	*/
	
	public function studentAuthentication()
	{
		$sql = "
		SELECT 
		
		ts_student_id , 
		ts_first_name , 
		ts_last_name , 
		ts_email
		
		FROM tbl_student
		WHERE ts_email = '$this->email' AND ts_password = '$this->password' LIMIT 1 ";
		
		$resset = mysql_query($sql);
		$this->error_info = mysql_error();
		
		if(mysql_num_rows($resset) > 0)
		{
			$fetch = mysql_fetch_assoc($resset);
			$this->student_id = $fetch['ts_student_id'];
			$this->first_name = $fetch['ts_first_name'];
			$this->lname_name = $fetch['ts_last_name'];
			$this->email = $fetch['ts_email'];
			
			return true;
		}
		else
		{
			return false;
		}
		
	} // Function END
	/*
		- To get the course details from the table
		- which is used in studentEnroll.php
		- table : tbl_courses
		- output : recored from the table.
	*/
	
	   
   public function getCourses()
   {       
  // echo $this->student_id;
   // exit; 
   
   $sql = " 
			SELECT
			
			tc_course_id AS course_id ,
			tc_course_name AS course_name ,
			tc_duration AS duration, 
			tc_fee AS fee, 
			tsc_course_id AS enrolled
			
			FROM tbl_courses
			LEFT JOIN tbl_student_courses ON tc_course_id=tsc_course_id AND tsc_student_id=$this->student_id 
			
			WHERE 1
		    ";
		 
		$resset = mysql_query($sql) or die(mysql_error());

		$courses = array();
		$i=0;
		while($fetch = mysql_fetch_assoc($resset))
		{
			$courses[$i]['course_id'] = $fetch['course_id'];
			$courses[$i]['course_name'] = $fetch['course_name'];
			$courses[$i]['duration'] = $fetch['duration'];
			$courses[$i]['fee'] = $fetch['fee'];
			$courses[$i++]['enrolled'] = $fetch['enrolled'];
			
		}
		
		$this->courses = $courses;
  	} // Function End
	/*
	
	getting course detils course id and status
	 it will return details only course status is active.
	
	*/
	
	public function getCoursesFee($course_id = '')
	{
		foreach($course_id as $cid)
		{
			$sql = "SELECT * FROM tbl_courses WHERE tc_course_id = $cid AND `tc_status`= 'ACTIVE'";
			$resset = mysql_query($sql) or die(mysql_error());
			while($rows = mysql_fetch_assoc($resset))
			{
				$this->course_fee[$rows['tc_course_id']] = $rows;
			}	
		}
		
		return true;
	}
	
	 /* 
	 	- Function for student enrolling
	 */
	 public function studentEnroll()
	 {

		$this->getCoursesFee($this->course_id);
		//echo '<pre>'; print_r($this->course_fee); exit;
		$this->transaction_uid = 'TR-'.mt_rand(100000,999999);
		
		// BEGIN A TRANSACTION //
		mysql_query('BEGIN');
		
		$sql = "INSERT INTO tbl_transactions SET 
		tt_transaction_uid = '".$this->transaction_uid."',
		tt_student_id='".$this->student_id."',
		tt_amount = '".$this->amount."',
		tt_trnsaction_type = '".$this->transaction_type."',
		tt_transaction_date = CURRENT_DATE(),
		tt_transaction_time = TIME(NOW()),
		tt_ip_address = '".$this->ip_address."' ";	
		 
		mysql_query($sql);
		if(!(mysql_affected_rows()) > 0){mysql_query('ROLLBACK'); return 'MAIN_TRAN_FAIL';}
		
		$this->transaction_id = mysql_insert_id();
		
		foreach($this->course_fee as $key => $value)
		{
			$query = "INSERT INTO tbl_transaction_details (tt_transactions_id,tt_course,tt_fee) VALUES(
			$this->transaction_id,'".$value['tc_course_id']."','".$value['tc_fee']."')";
			
			mysql_query($query) or die(mysql_error());
			if(!(mysql_affected_rows() > 0)){mysql_query("ROLLBACK"); return 'TRANSACTION_DETAILS_FAIL'.mysql_error();}
		}
		
		foreach($this->course_fee as $key => $value)
		{
			
		$sql = "INSERT INTO  tbl_student_courses SET 
		`tsc_student_id` = $this->student_id,
		`tsc_course_id` = '".$value['tc_course_id']."'";
		mysql_query($sql)or die(mysql_error());
		if(!(mysql_affected_rows() > 0)){mysql_query("ROLLBACK"); return 'STUDENT_COURSE ENROLL IS_FAIL';}
		}
		mysql_query("COMMIT");
		return true;
		
	}//END OF studentEnroll()
	/*
	
	    - To get records from the tabel.
		- used in updatestudent.php
		- input : student id from session
		- output : student details. 
	
	*/
	public function getData()
	{
		$rows = array();
		$result = mysql_query("select * from tbl_student where ts_student_id = $this->student_id")or die(mysql_error());		
		while($row = mysql_fetch_assoc($result))
		{
			//echo '<pre>';print_r($row);exit;
			$this->student_id =   mysql_real_escape_string( $row['ts_student_id']);
			$this->first_name =   mysql_real_escape_string( $row['ts_first_name']);
			$this->last_name  =   mysql_real_escape_string( $row['ts_last_name']);
			$this->email      =   mysql_real_escape_string($row['ts_email']);
			$this->ts_mobile  =   mysql_real_escape_string($row['ts_mobile']);
			$this->ts_dob     =   mysql_real_escape_string($row['ts_dob']);
			$this->ts_address =   mysql_real_escape_string($row['ts_address']);
			$this->ts_gender  =   mysql_real_escape_string($row['ts_gender']);
		}
		if($this->student_id != '')
			return true;
		else
			return false;
	}
	
  
  
} // Class End
  
  
  




?>