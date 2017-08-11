	<?php 
	 
	   session_start();
	 
	 ?>
    	<script src="js/jquery-3.2.1.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	
	<style>
	img.image-size {
	width: 57%;
	}
	ul.footer {
	margin-top: 10px;
	text-align: center;
	}
	
	ul.footer li {
	color: #333;
	display: inline-block;
	}
	
	#footer {
	bottom: 12px;
    height: 50px;
    left: 0;
    position: relative;
    right: 0;
	}
	label.error {
	color: red;
	font-size: 13px;
	font-family: monospace;
	}
	
	.error-msg {
	color: red;
	font-size: 14px;
	font-family: serif;
	}
	</style>
	<script>
	$( function() {
	$( "#datepicker" ).datepicker({
	});
	});
	</script>
	</head>
	<nav class="navbar navbar-inverse">
	<div class="container-fluid">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>                     
		</button>
		<a href="#"><img src="../images/logo.png" class="image-size"></a>
	</div>
	<div class="collapse navbar-collapse" id="myNavbar">
	<ul class="nav navbar-nav">
	</ul>
	<ul class="nav navbar-nav navbar-right">
		<?php if(!isset($_SESSION['student_id'])){?>
		<li><a href="template.php?option=login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
			 <li><a href="template.php?option=registration"><span class="glyphicon glyphicon-log-in"></span> Registration</a></li>
		 <?php }
		 else{?>
			 <li><a href="template.php?option=dashboard"><span class="glyphicon glyphicon-log-in"></span> Home </a></li>
			 <li><a href="executes/logout.php"><span class="glyphicon glyphicon-log-in"></span> logout</a></li>
		<?php }?>
	</ul>
	</div>
	</div>
	</nav>