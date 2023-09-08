<?php
   require "./connect.php";
   mysqli_set_charset($con,'utf8');

   $number = $_GET['number'];
   $sql = "SELECT * FROM customer WHERE Phone = $number";

   $customer = mysqli_query($con, $sql);
    $customer = mysqli_fetch_assoc($customer);

   
   
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/signin.css">
</head>
<body>
<div class="login">
        <div class="title">Wellcom to HanShop!</div>
        <div class="des">
        moi ban nhap username...
        </div>
        <form action="./handle_update_username.php" method="POST">
        <div class="group">
            <input type="text" name="username" id="username" placeholder="Enter username">
        </div>
    
       
        <div class="signIn">
            <button>Continue</button>
        </div>
        </form>
        
    </div>
 










<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="js/signin.js"></script>
</body>
</html>