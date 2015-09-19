<?php 
$user = "root";
$pass = "root";
$dbh = new PDO('mysql:host=localhost; dbname=asl; port:8889', $user, $pass);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$uname = $_POST['uname'];
	$password = $_POST['password'];
	$stmt = $dbh->prepare("INSERT INTO clients (fname,lname,email,uname,password) VALUES (:fname, :lname, :email, :uname, :password);");
	$stmt->bindParam(':fname', $fname);
	$stmt->bindParam(':lname', $lname);
	$stmt->bindParam(':email', $email);
	$stmt->bindParam(':uname', $uname);
	$stmt->bindParam(':password', $password);
	$stmt->execute();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form</title>
     <!-- CSS
 	================================================== -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
  	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
  	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
  
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
								<li><a href="register.php">New User</a></li>
								<li><a href="#">Log out</a></li>
							</ul>                    
						</li> 
					</ul> 
				</div>
			 </nav> 
		</div>

	<form enctype="multipart/form-data" action="board.php" method="POST">
		<!--Username-->
	    <input name="username" type="text" id="username" placeholder="Username" required />
	    <!--Username-->
	    <input name="password" type="text" id="password" placeholder="Password" required />
	    <input type="submit" value="Login" />
	</form>

	<!-- Footer
    ================================================== -->
	<footer>
		<small>Developed and designed by Angelena Ward Copyright &copy 2015</small>
	</footer>		
	
	<!-- JavaScript
    ================================================== -->
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script src="js/bootstrap.min.js"></script>



</body>
</html>