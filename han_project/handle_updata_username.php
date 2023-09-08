<?php 

require_once './connect.php';


$number = $_POST['number'];
$username = $_POST['username'];

$sql = "UPDATE customer 
SET Username = '$username'
WHERE Phone = $number";


mysqli_query($con, $sql);

header('Location: ./signin.php');
