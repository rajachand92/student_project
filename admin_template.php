srikanth<?php 
require 'classes/Admin.php';
require_once("db/database.php");
	//session_start();
	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <title>adminpage</title>
    <script src="js/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/admin_style.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
    <div class="col-md-12 container">
    <div class="row">
 <?php   if(isset($_GET['option'])){
	 require 'views/admin/sidebar.php';
   switch($_GET['option'])
	{	  
		
		case 'dashborad': 
					  require 'views/admin/dashboard.php'; 
					  break;
		case 'course_update': 
					  require 'views/admin/update_course.php'; 
					  break;
		case 'courses': require_once("views/admin/courses.php");
						break;
		case 'students': require_once("views/admin/students.php");
						break;
		case 'student_update': require_once("views/admin/student_update.php");
						break;				
		default : require_once("views/admin/index.php");
	}
 }
 else{
	 	require_once("views/admin/index.php");
	 }?>
    

    </div>
    </div>
    
    
    </body>
</html>