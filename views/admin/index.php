	<style>
	.admin-login {
	margin-left: 39%;
	margin-top: 13%;
	border-style: groove;
	width: 18%;
	/* align-items: center; */
	text-align: center;
	}
	</style>
    
	<div class="admin-login"> 
	<form action="executes/admin/admin_login.php" method="post" >
	
	<label style="text-align: left;">Username : </label><br />
	</label><input type="text" name="email"/><br />
	<label>Password :</label><br />
	<input type="password" name="password"/><br />
	<input type="submit" name="submit" class="btn btn-primary right"/>
	
	</form>
	</div>