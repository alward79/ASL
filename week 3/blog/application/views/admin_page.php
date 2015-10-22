<html>
	<?php
		if (isset($this->session->userdata['logged_in'])) {
		$username = ($this->session->userdata['logged_in']['username']);
		$email = ($this->session->userdata['logged_in']['email']);
		
		} else {
			header("location: asl");
		}
	?>
	<head>
		<title>Admin Page</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
	</head>
	<body>
		<div id="profile">
			<?php
				echo "Hello <b id='welcome'><i>" . $username . "</i> !</b>";
				echo "<br/>";
				echo "<br/>";
				echo "Welcome to My Blog";
				echo "<br/>";
				echo "<br/>";
			?>
			<b id="logout"><a href="logout">Logout</a></b>
		</div>

		<br/>

	</body>
</html>