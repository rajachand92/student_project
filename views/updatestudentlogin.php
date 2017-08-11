<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<h2>updating student information</h2>
        <form  name="updatestudent_details" action="../executes/updatestudent.php" method="post" autocomplete="off">
        <table width="500" border="1">
        <tr>
        <td>firstname</td>
        <td><label for="fname"></label>
        <input type="text" name="fname" id="fname" max=25 /></td>
        </tr>
        <tr>
        <td>lastname</td>
        <td><label for="lname"></label>
        <input type="text" name="lname" id="lname" max=25 /></td>
        </tr>
        <tr>
        <td>mobile</td>
        <td><label for="mobile"></label>
        <input type="tel" name="mobile" id="mobile" maxlength="10"   /></td>
        </tr>
        <tr>
        <td>DOB</td>
        <td><label for="dob"></label>
        <input type="text" name="dob" id="dob" maxlength="10" /></td>
        </tr>
        
        <tr>
        <td>address</td>
        <td><label for="address"></label>
        <textarea name="address" id="address" cols="45" rows="5"></textarea></td>
        </tr>
        <tr>
        <td><input type="submit" name="submit" id="submit" value="Submit"  onclick="return validate()"/></td>
        </tr>
        </table>
  </form>
  <script type="text/javascript">


	function validate()
	{
		var fname = document.getElementById('fname').value;
		var lname = document.getElementById('lname').value;
		var mobile = document.getElementById('mobile').value;
		var dob = document.getElementById('dob').value;
		
		flog = firstName();
		if(!flog){
			return false;
			}
		flog1 = lastName();
		if(!flog1)
		{
			return false;
		}
			
		flog2 = mobilevalidation();
		if(!flog2)
		{return false;}
		
		 flog3 = dobValidation();
		 if(!flog3)
		 {return false;}
	
	}
	function mobilevalidation()
	{
		var mobile = document.getElementById('mobile').value;
		var reg = /^\d{10}$/; 
		
		if(mobile.length<10)
		{
		alert("mobile number must be 10 digits");
		document.getElementById('mobile').focus();
		return false;	
		}
		
		else if (reg.test(mobile) == false) 
		{
			alert('Invalid mobile number plz enter proper mobile number');
			return false;
		}
		
		return true;
	
	}
	function firstName()  
	{  
		var fname = document.getElementById('fname').value;
		var letters = /^[A-Z a-z]+$/; 
		if(fname == null || fname == "")
		{
			alert("firstname can't be empty");
			document.getElementById('fname').focus();
			return false;

		} 
		
		else if(!letters.test(fname))  
		{  
			alert("plz enter your first name properly");  
			return false;  
		}
		else 
		{
			return true;
		}
	}  
	
	function lastName()  
	{  
		var lname = document.getElementById('lname').value;
		var letters = /^[A-Z a-z]+$/;
		if(lname == null || lname == "")
		{
			alert("lastst name can't be empty");
			document.getElementById('lname').focus();
			return false;

		}   
		
		else if(!letters.test(lname))  
		{  
			alert("plz enter your last name properly");  
			return false;  
		}
		else
		{return true;}
	}  
	function dobValidation()
	{
		var dob = document.getElementById('dob').value;
	   if ((dob=="")||(dob==null))
		
		{
			alert("This field is required. Please enter date yyyy/mm/dd!")
			document.getElementById('dob').focus();
			return false;
		}
		
		else if (dob.length!=10)
		{
			alert("Invalid date! The correct date format is like '2004/01/01'. Please try again.")
			return false;
		}	
		else 
		{
		 return true;	
		}
	}
   </script>

</body>
</html>