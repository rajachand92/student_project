<?php
	if(isset($_GET['fail']) && $_GET['fail'] != '')
	{
		echo "Username/Password is wrong ...:(";
	}
	
	if(isset($_GET['reg_secc']) && $_GET['reg_secc'] != '')
	{
		echo "Registration is successfull, Please login to access..:)";
	}
	
	
?>
<form action="executes/login.php" method="post"  autocomplete="off">
<h2>student login</h2>
<table width="500" border="0">
  <tr>
    <td>email</td>
    <td><label for="email"></label>
      <input type="text" name="email" id="email" required="required" /></td>
  </tr>
 <tr>
    <td>password</td>
    <td><label for="password"></label>
      <input type="password" name="password" id="password" required="required" /></td>
  </tr>
  <tr>
    <td><input type="submit" name="submit" id="submit" value="Submit"  />
    
  </tr>
</table>
</form>
