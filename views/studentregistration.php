<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registration - Student</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
<h2>student registration</h2>
<?php
	if(isset($_GET['fail']) && $_GET['fail'] != '')
	{
		echo "Registration failed, Please try again ...:(";
	}
?>

    <form name="studentregistration" action="../executes/addstudent.php" method="post" autocomplete="off">
    <table width="500" border="1">
    <tr>
    <td>firstname</td>
    <td><label for="fname"></label>
    <input type="text" name="fname" id="fname" max=25/></td>
    </tr>
    <tr>
    <td>lastname</td>
    <td><label for="lname"></label>
    <input type="text" name="lname" id="lname"  max=25/></td>
    </tr>
    
    <tr>
    <td>mobile</td>
    <td><label for="mobile"></label>
    <input type="tel" name="mobile" id="mobile" required="required" maxlength="10"/></td>
    </tr>
    <tr>
    <td>email</td>
    <td><label for="email"></label>
    <input type="email" name="email" id="email"  required="required" /></td>
    </tr>
    <tr>
    <td>password</td>
    <td><label for="password"></label>
    <input type="text" name="password" id="password" required="required" maxlength="15"/></td>
    </tr>
    <tr>
    <td>confirm password</td>
    <td><label for="password"></label>
    <input type="text" name="password2" id="password2" required="required" maxlength="15"/></td>
    </tr>
    <tr>
    <td>dob</td>
    <td><label for="dob"></label>
    <input type="text" name="dob" id="dob" required="required" min="1993-12-31" max="1996-12-31"/></td>
    </tr>
    <tr>
    <td>gender</td>
    <td><input type="radio" name="gender" id="male" value="male" />
    <label for="male">male 
    <input type="radio" name="gender" id="female" value="female" />
    female</label></td>
    </tr>
    <tr>
    <td>address</td>
    <td><label for="address"></label>
    <textarea name="address" required="required" id="address" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
    <td><input type="submit" name="submit" id="submit" value="Submit" onclick="return validate()"/></td>
    </tr>
    </table>
    
    </form>
<script type="text/javascript">


function validate()
{
	
		//var fname = document.getElementById('fname').value;
      	//var lname = document.getElementById('lname').value;
		//var mobile = document.getElementById('mobile').value;
		//var email = document.getElementById('email').value;
		//var password = document.getElementById('password').value;
		//var password1 = document.getElementById('password2').value;
		//var gender = document.getElementsByName('gender').value;
		//var dob = document.getElementById('dob').value;
			
			flog = firstName();
			if(!flog)
			{
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
			
			flog3 = validateEmail();
			if(!flog3)
			{return false;}
			
			flog4= validatePassword();
			if(!flog4)
			{return false;}
			
			flog5 = dobValidation();
			if(!flog5)
			{return false;}
			
			/*flog6 = validateGender();
			if(!flog6)
			{return false;}*/
	
		
		    
	

}
		
		function validateEmail()
		{
			var email = document.getElementById('email').value;
			var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
		
			if (reg.test(email) == false) 
			{
			alert('Invalid Email Address');
			return false;
			}
			
			return true;
			
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
			else
			{
			  return true;
			}
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
			alert("lastname can't be empty");
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
		/* function validateGender()
		 {
			 var gender = document.getElementsByName('gender').value;
		     if(gender == 'male' || gender == 'female')	
			 {
			   return true;	 
			 } 
			 else 
			 {
			   alert("plz choos your gender");	
			   return false; 
			 }
			 
		 }*/

         function validatePassword()
		 {
			var password = document.getElementById('password').value;
		    var password1 = document.getElementById('password2').value;
			
		     if(password != password1)
		    {
			  alert("plz enter proper passwords two passwords must be equal");
			
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