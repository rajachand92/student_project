<?php 
require_once("includes/session_check.php");
require("../classes/studentclass.php");

$obj=new studentclass();
$result = $obj->getCourses();
print'<pre>';
print_r($result);
echo $result;
    var_dump($obj->tc_course);
	
 

?>