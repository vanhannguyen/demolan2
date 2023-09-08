<?php
   require "./connect.php";


   
   
   
  
   


   $number = $_POST['number'];
   $email = $_POST['email'];
   $username = $_POST['username'];
   $password = md5($_POST['password']);
   $created = date("Y-m-d");
  
   $sql = "INSERT INTO customer(Phone, Email, Username, Password, Created)
   VALUES ('$number','$email','$username','$password','$created');";
   



   mysqli_query($con, $sql);
   
   header('Location: ./signin.php');

?>