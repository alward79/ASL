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
    $stmt = $dbh->prepare("INSERT INTO microboard (fname,lname,email,uname,password) VALUES (:fname, :lname, :email, :uname, :password);");
    $stmt->bindParam(':fname', $fname);
    $stmt->bindParam(':lname', $lname);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':uname', $uname);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
}
?>

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
<body><center>
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

        <div class="page-header">
            <h1>User Info</h1>
        </div>
    </header>
    
    <!-- Form
    ================================================== -->
    <div id="contactform">
        <form action="register.php" method="POST">
            <fieldset>
                <legend>Add New Contact</legend>
            
                <!-- First Name -->
                <input name="firstname" type="text" id="fname" placeholder="First Name" required /><br> 
                
                <!-- Last Name -->
                <input name="lastname" type="text" id="lname" placeholder="Last Name" required /><br> 
    
                <!-- E-mail Address -->
                <input name="email" type="text" id="email" required placeholder="Email Address"> <br>
             
                <!--Username-->
                <input name="user-name" type="text" id="uname" required placeholder="User Name"><br>
                
                <!--Password--> 
                <input name="password" type="text" id="pword" required placeholder="Passwrod"><br>

                <input type="submit" name="submit" value="Submit">
            </fieldset>
        </form>
    </div>

    <!-- Table
    ================================================== -->
    <table>
        <tr>
            <th>First Name </th>
            <th>Last Name </th>
            <th>Email </th>
            <th>Username </th>
            <th>password </th>
        </tr>
    
        <?php 
        $stmt = $dbh->prepare('SELECT * FROM microboard;');
        $stmt->execute();
        $result = $stmt->fetchall(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
            echo '<tr>
                <td>'.$row['fname'] .'</td>
                <td>'.$row['lname'] .'</td>
                <td>'.$row['email'] . '</td>
                <td>'.$row['uname']. '</td>
                <td>'.$row['password'].'</td>
                <td><a href="delete.php?id='.$row['id'].'">Delete</a></td>
             
                </tr>';
        }
        ?>
    </table> 

    <!-- Footer
    ================================================== -->
    <footer>
        <small>Developed and designed by Angelena Ward Copyright &copy 2015</small>
    </footer>   

    <!-- JavaScript
    ================================================== -->
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="js/bootstrap.min.js"></script>   
</center></body>
</html>