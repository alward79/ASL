<?php
$user = "root";
$pass = "root";
$dbh = new PDO('mysql:host=localhost; dbname=asl; port:8889', $user, $pass);


//the id of the record to delete should have been passed as a url param, so grab from $_GET array and store that id in a variable
$id = $_GET['id'];

//use pdo object to prepare a delete statement with params
$stmt = $dbh->prepare("DELETE FROM microboard WHERE id = :id;");
//bind that param to our id variable
$stmt->bindParam(':id', $id);

//execute deletion
$stmt->execute();

//redirect to fruits.php
header('Location: register.php');

//kill process
die();

?>