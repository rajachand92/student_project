<?php 
class Admin
{
	
	public $adminEmail;
	public $password;
	public $adminName;
	public $adminId;
	public $errMsg;
	public $courseId;
	public $courseName;
	public $coursefee;
	public $courseduration;
	public $course_sttus;
	public $courses = array();
	
	public $studentId;
	public $student=array();
	public $studentFName;
	public $studentLName;
	public $mobile;
	public $email;
	public $address;
	public $student_status;
	public $ts_dob;
	
	
	public function __construct()
	{
		session_start();
		
	} 
	
	public function login()
	{
		$sql = "SELECT * FROM tbl_admin WHERE ta_admin_email = '$this->adminEmail' AND ta_password = '$this->password'";
		
		$resset = mysql_query($sql);
		if(!$resset)
		{
			$this->errMsg = mysql_error() or die(mysql_error());
		}
		
		if(mysql_num_rows($resset) > 0)
		{
			$resset = mysql_fetch_assoc($resset);
			$this->adminId = $resset['ta_id'];
			$this->adminName = $resset['ta_admin_name'];
			$this->adminEmail = $resset['ta_admin_email'];
			
			return true;
		}
		
		else
		{
			return false;	
		}
	}// login function end
	
	
	public function getCoursedata($courseId = '')
	{
		$sql = "SELECT * FROM tbl_courses WHERE 1 ";
		if($courseId != '')
		{
			$sql .= " AND tc_course_id = $courseId";	
		}
		//echo $sql;exit; for checking courseid is came or not. with help of sql query.
		
		$resset = mysql_query($sql)or die(mysql_error());
		while($fetch = mysql_fetch_assoc($resset))
		{
			$this->courses[$fetch['tc_course_id']] = array(
															"courseName"=>$fetch['tc_course_name'],
														    "coursefee"=>$fetch['tc_fee'],
															"courseduration"=>$fetch['tc_duration'],
															"course_sttus"=>$fetch['tc_status']
															);
		}
	}// getCoursedata()function end

	public function getStudentdata($studentId = '')
	{
		$sql = "SELECT * FROM tbl_student where ts_status='ACTIVE'";
		
		if($studentId != '')
		{
			$sql .= " AND ts_student_id = $studentId";	
		}
		//echo $sql;exit;
		$resset = mysql_query($sql);
		while($fetch = mysql_fetch_assoc($resset))
		{
			$this->student[$fetch['ts_student_id']] = $fetch;
		}
	}//getStudentdata() function end
	
	public function updateCourse()
	{
		$sql = "UPDATE tbl_courses SET 
		
		tc_course_name = '$this->courseName',
		tc_fee = '$this->coursefee',
		tc_duration = '$this->courseduration'
		
		WHERE tc_course_id = $this->courseId
		";
		//echo $sql; exit;
		$resset = mysql_query($sql)or die(mysql_error());
		if(mysql_affected_rows() > 0)
		{
			return true;
		}
		else
		{
			$this->errMsg = mysql_error();
			return false;	
		}
	}//  updateCourse() function end
	
	public function addCourse()
	{
		$sql = "INSERT INTO tbl_courses SET 
		
		tc_course_name = '$this->courseName',
		tc_fee = '$this->coursefee',
		tc_duration = '$this->courseduration'
		tc_created_date=CURRENT_DATE ,
		tc_created_time=TIME(NOW()) 
		";
		//echo $sql; exit;
		$resset = mysql_query($sql);
		if(mysql_affected_rows() > 0)
		{
			return true;
		}
		else
		{
			$this->errMsg = mysql_error();
			return false;	
		}
	}// addCourse() function end
	
	public function course_status_update($status)
	{
		//echo $status; exit;
 		$this->course_status_update = ($status == 0)?'INACTIVE':'ACTIVE';
		
		$sql = "update tbl_courses SET
			
			tc_status = '$this->course_status_update'
			
			WHERE tc_course_id = $this->courseId 
			";
			//echo $sql; exit;
		$resset = mysql_query($sql);
		echo mysql_error();
		if($resset)
		{
			return true;
		}
		else
		{
			return false;
		}
	}//course_status_update() function end
	
	public function studentUpdate()
	{
		$sql=" UPDATE tbl_student SET
		ts_first_name='".$this->studentFName."',
		ts_last_name='".$this->studentLName."',
		ts_dob ='".$this->ts_dob."',
		ts_mobile='".$this->mobile."',
		ts_address    ='".$this->address."',
		ts_update_date =CURRENT_DATE ,
		ts_updated_time  =TIME(NOW()),
		ts_status='".$this->student_status."'
		
		WHERE ts_student_id='".$this->studentId."'
		";
		$res=mysql_query($sql);
		
		if($res)
			return true;
		else
		{
			return false;	  
		}
	} // end of studentUpdate()
	
	public function addstudent()
	{
		$sql = "INSERT INTO tbl_student SET 
		
		ts_first_name='".$this->studentFName."',
		ts_last_name='".$this->studentLName."',
		ts_dob ='".$this->ts_dob."',
		ts_mobile='".$this->mobile."',
		ts_address    ='".$this->address."',
		ts_status='".$this->student_status."'
		";
		//echo $sql; exit;
		$resset = mysql_query($sql);
		if(mysql_affected_rows() > 0)
		{
			return true;
		}
		else
		{
			$this->errMsg = mysql_error();
			return false;	
		}
	}	
}// end of class

?>