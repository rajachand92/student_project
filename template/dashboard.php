<?php
require_once("includes/session_check.php");

?>
<h3> welcome <?php echo$_SESSION['first_name'] ?> </h3>
<a href="template.php?option=courses">Enroll Courses</a><br />

<!--<a href="template.php?option=view">View Profile</a><br />-->
<a href="template.php?option=update&sid=<?php echo $_SESSION['student_id']?>">updation profile</a><br>






