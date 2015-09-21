<?php
$user = "root";
$pass = "root";
$dbh = new PDO('mysql:host=localhost; dbname=asl; port:8889', $user, $pass);


$id = $_GET['id'];

$stmt = $dbh->prepare("DELETE FROM microboard WHERE id = :id;");
$stmt->bindParam(':id', $id);

$stmt->execute();
header('Location: register_view.php');

die();

?>