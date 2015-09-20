<!DOCTYPE html>
<html>
<head>
    <title>Form</title>
     <!-- CSS
 	================================================== -->
    <link href="view/css/bootstrap.min.css" rel="stylesheet">
    <link href="view/css/style.css" rel="stylesheet">
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
								<li><a href="register.php\">New User</a></li>
								<li><a href="#">Log out</a></li>
							</ul>                    
						</li> 
					</ul> 
				</div>
			 </nav>
		</div>
	</div>
</body>
</html>