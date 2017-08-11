<?php
	//error_reporting(E_ALL & ~E_NOTICE);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login Page</title>
</head>

<body>
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
<form action="../executes/login.php" method="post" >
<h2>student login</h2>
<table alilgn="center" class="table">
  <tr>
    <td>email</td>
    <td><label for="email"></label>
      <input type="text" autocomplete="off" name="email" id="email" required="required" /></td>
  </tr>
 <tr>
    <td>password</td>
    <td><label for="password"></label>
      <input type="password" name="password" id="password" required="required" /></td>
  </tr>
  <tr>
    <td><input type="submit" name="submit" id="submit" value="Submit"  />
    <a href="studentregistration.php">registration<a></td>
  </tr>
</table>
</form>
</body>
</html>