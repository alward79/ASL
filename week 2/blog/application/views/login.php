<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form</title>
   
</head>
<body>
	<!-- Primary Page Layout
	================================================== -->
	<div class="container">
		<!--navigation -->
		<div class="row">
			<nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="glyphicon glyphicon-arrow-down"></span>
					  	MENU
					</button>
				</div>
				<div class="collapse navbar-collapse" id="collapse">
					<ul class="nav navbar-nav">
						<li class="active"><a href="index.php">Home</a></li>
						<li><a href="#">About</a></li>
						<li class="dropdown"><a href="#" data-toggle="dropdown">Admin<span class="caret"></a></span>
							<ul class="dropdown-menu">
								<li><a href="register.php\">New User</a></li>
								<li><a href="#">Log out</a></li>
							</ul>                    
						</li> 
					</ul> 
				</div>
			 </nav>
		</div>
	</div>

	<?php
		echo form_open('blog');
		echo form_input('uname', 'admin');
		echo form_password('password', 'password');
		echo form_submit('submit', 'Login');
		echo form_close();
	?>
	
	<!-- JavaScript
    ================================================== -->
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script src="js/bootstrap.min.js"></script>



</body>
</html>