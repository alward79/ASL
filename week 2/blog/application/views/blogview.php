<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<html>
<head>
	
<title><?php echo $title;?></title>

</head>
<body>
	<h1><?php echo $heading;?></h1>

	<?php foreach($query->result() as $row): ?>
	<h3><?=$row->title?></h3>
	<p><?=$row->content?></p>

	<hr>
	<?php endforeach; ?>


</body>
</html>