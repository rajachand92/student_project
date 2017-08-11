<?php 
require("../classes/studentclass.php");
$obj=new student();
$result = $obj->getCourses();
echo $result;
    var_dump($obj->tc_course);
	
 

?>