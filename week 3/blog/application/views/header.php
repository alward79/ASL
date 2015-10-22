<!DOCTYPE html>
<html>
<head>
    <title>Form</title>
     <!-- CSS
 	================================================== -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">

    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
  	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
  	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
</head>
<body>
	<style type="text/css">
		/* #Basic Styles
	================================================== */
	body{
		padding: 70px;
	}

	/* #Navigation
	================================================== */
	.breadcrumb > li + li:before {
	  content: none;
	}
	.navbar-inverse .navbar-toggle {
		color: #BC1320;
		font-weight: bold;
		border-color: #999;
	}
	.navbar-inverse .navbar-toggle:hover {
		background-color: #ddd;
		color: #333;
	}
	.navbar-inverse .navbar-toggle .glyphicon {
		color: #BC1320;
	}
	.navbar-inverse .navbar-toggle:hover .glyphicon {
		color: #333;
	}

	/* #Typography
	================================================== */
	h1 {
		font-family: 'Aguafina Script', cursive;	
	}
	h1 {
		font-size: 3.5em; 
	}

	article p {
		padding-bottom: 1em;
	}	
	/* #Links
	================================================== */
	a, a:visited { 
		color: #BC1320; 
		text-decoration: underline; 
	}
	a:hover, a:focus { 
		color: #666; 
	}
	p a, p a:visited { 
		line-height: inherit; 
	}

	/* #buttons
	================================================== */
	.btn-info, .btn-info:visited{
		background-color: #BC1320;
		border-color: #8B1014;
		color: white;
	}
	.btn-info:hover, .btn-info:focus,
	.btn-info:active, .btn-info.active,
	.open .dropdown-toggle.btn-info {
	  color: #ffffff;
	  background-color: #3F2B22;
	  border-color: #333;
	}

	/* #Form
	================================================== */
	form{
		float: left;
	}

	fieldset{
	    border-top: 1px solid #ddd;
	    border-right: none;
	    border-left:none;
	    border-bottom:none;
	    margin: 1px;
	}
	input[type=text], input[type=phone], input[type=email], input[type=password] {
	    border: 2px solid #ddd;
	    background: white;
	    border-radius: 4px;
	    padding: 5px;
	    margin: 10px 0px 10px 20px;
	}
	input[type=submit] {
	   	cursor: pointer;
	   	margin: 10px;
	}
	label, input {
	    display:inline-block; 
	}

	/* #Table
	================================================== */
	table{
	    position: relative;
	    border-spacing: 0px;
	    width: auto;
	}

	tr, td, th {
	    padding: 10px;
	    border-bottom: 1px solid #cbd2d8;   
	}
	tr:hover{
	    background-color: #b5b5b6;
	}
	</style>
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
						<li><a href="http://localhost:8888/blog/">Home</a></li>
						<li><a href="">About</a></li>
						<li class="dropdown"><a href="#" data-toggle="dropdown">Admin<span class="caret"></a></span>
							<ul class="dropdown-menu">
								<li><a href="http://localhost:8888/blog/index.php/user_authentication/user_registration_show">New User</a></li>
								<li><a href="http://localhost:8888/blog/">Log out</a></li>
							</ul>                    
						</li> 
					</ul> 
				</div>
			 </nav>
		</div>
	</div>

	<!-- JavaScript
    ================================================== -->
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>
	<link href="js/bootstrap.min.js">

</body>
</html>