<?php
//echo '<pre>';
//print_r($_POST);
//exit;
//session_start();
require_once("../../db/database.php");
require ('../../classes/Admin.php');

$connect = new Admin();
echo '<pre>'; var_dump($connect);
$connect->adminEmail = $_POST['email'];
$connect->password = $_POST['password'];
//echo '<pre>'; var_dump($connect); 
//echo '<pre>'; var_dump($connect);
$result = $connect->login();

//exit;echo $connect->errMsg;
if($result)
{
	$_SESSION['adminId'] = $connect->adminId;
	$_SESSION['adminEmail'] = $connect->adminEmail;
	$_SESSION['adminName'] = $connect->adminName;
	 header('location:../../admin_template.php?option=dashborad');
}
else
{
	header('location:../../admin_template.php');
}

?>