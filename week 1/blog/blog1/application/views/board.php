<!DOCTYPE HTML>
<html>
<head>
    <title>New User Info</title>
     <!-- CSS
    ================================================== -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
</head>
<body>
	<header>
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
                                <li><a href="index.php">Log out</a></li>
                            </ul>                    
                        </li> 
                    </ul> 
                </div>
             </nav> 
        </div>
    </header>

	<h3><?php echo $blog_heading; ?></h3>

	<form action="<?php echo $blog_form_action; ?>" method="post">
	<input type="hidden" name="blog_content_id" value="<?php echo isset($blog_content_id) ? $blog_content_id : ''; ?>" />
	<dl>
	<dt>Headline</dt>
	<dd><input type="text" name="blog_content_headline" value="<?php echo isset($blog_content_headline) ? $blog_content_headline : ''; ?>"/></dd>

	<dt>Category</dt>
	<dd>
	<select name="id">
	<?php
	        foreach($categories as $id=>$cat)
	        {
	                echo "<option value=\"$id\"";
	                /*** mark as selected ***/
	                echo (isset($selected) && $id==$selected) ? ' selected' : '';
	                echo ">$cat</option>\n";
	        }
	?>
	</select>
	<dd>

	<dt>Blog</dt>
	<dd>
	<textarea name="blog_content_text" rows="5" cols="45"><?php echo isset($blog_content_text) ? $blog_content_text : ''; ?></textarea>
	</dd>


	<dd><input type="submit" value="<?php echo $blog_form_submit_value; ?>" /></dd>
	</dl>
	</form>

	<?php

    /*** check for valid database connection ***/
    if($db)
    {
        /*** the SQL query to select last 5 blogs ***/
        $sql = "SELECT
            title,
            body,
            AS id
            FROM
            asl
            JOIN
            id
            USING(d)
            JOIN
             body
            USING(id)
            ORDER BY id DESC
            LIMIT 5";

        /*** run the query ***/
        $result = mysql_query($sql) or die(mysql_error());

        /*** create the blog array ***/
        $blog_array = array();

        /*** check for a valid resource ***/
        if(is_resource($result))
        {
            /*** check there are results ***/
            if(mysql_num_rows($result) != 0)
            {
                /*** stuff the blog entries into the blog array ***/
                while($row = mysql_fetch_array($result, MYSQL_ASSOC))
                {
                    $blog_array[] = $row;
                }
            }
        }
        else
        {
            echo 'Blog Unavailable';
        }
    }
    else
    {
        echo 'No Blog Entries Available';
    }
?>

<h1>PHPRO.ORG Blog</h1>
<p>
Welcome to the PHPRO.ORG Blog...
</p>


<?php

    if(sizeof($blog_array) > 0)
    {
        /*** loop over the blog array and display blogs ***/
        foreach($blog_array as $blog)
        {
            echo '<div class="blog_entry">';
            echo '<p><span class="category">'.$blog['title'].': </span>
            <span class="blog_date">Added by '.$blog['body'].' on '.$blog['blog_content_date'].'</p>';
            echo '<h2>'.$blog['title'].'</h2>';
            echo '<p>'.$blog['body'].'</p>';
            echo '</div>';
        }
    }
    else
    {
        echo 'No Blogs Here';
    }
?>
	 <!-- Footer
    ================================================== -->
    <footer>
        <small>Developed and designed by Angelena Ward Copyright &copy 2015</small>
    </footer>   

</body>
</html