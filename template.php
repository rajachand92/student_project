<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login Page</title>
<?php
	require("includes/header.php");
?>

<body>

<?php

if(isset($_GET['option']) && $_GET['option'] != '')
{

switch($_GET['option'])
{
    case"login":	
 	require('template/authentication.php');
	break;
	case"registration":	
 	require('template/studentregistration.php');
	break;
	case"update":
	require('template/updatestudentlogin.php');
	break;
	case"courses":
	require('template/coursesform.php');
	break;
	case"dashboard":
	require('template/dashboard.php');
	break;
	case"payment":
	require('template/payment.php');
	break;
	case"view":	
 	require('template/viewprofile.php');
	break;
	default :
	require('template/landing.php');
}
}
else
{
	require('template/landing.php');
}
?>
<?php  include 'includes/footer.php'; ?>
</body>

</html>
