<?php
   session_start();
   require_once './connect.php';

   ?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/customer.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="title">EDIT PROFILE</div>
        <form action="./handle_update_customer.php" method="POST" enctype="multipart/form-data">
        
        <div class="group">
            <input type="text" name="productname" id="productname" placeholder="Enter productname">
        </div>
        <div class="group">
            <input type="text" name="content" id="content" placeholder="Enter content">
        </div>
        <div class="group">
            <input type="text" name="contentdetail" id="contentdetail" placeholder="Enter contentdetail">
        </div>
        <div class="group">
            <input type="text" name="priceinput" id="priceinput" placeholder="Enter priceinput">
        </div>
        <div class="group">
            <input type="text" name="priceoutput" id="priceoutput" placeholder="Enter priceoutput">
        </div>
        <div class="group">
            <input type="text" name="size" id="size" placeholder="Nhap ma size">
        </div>
        <div class="group">
            <input type="text" name="color" id="color" placeholder="Enter color">
        </div>
        <div class="group">
            <input type="number" name="status" id="status" placeholder="Enter status">
        </div>

        <div class="uploadanh">
            <label for="">Them anh san pham:....</label>
            <input type="file" name="upload_file"  id="upload_file">
        </div>
        <div class="signIn">
            <button type="submit"  name="submit">Continue</button>
        </div>
        </form>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
</html>
