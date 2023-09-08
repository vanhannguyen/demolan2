<?php
   require "./connect.php";
   session_start();
   
 

   
  
   
  
   


   $fullname = $_POST['fullname'];
//    echo $fullname;
   $username = $_POST['username'];
//    echo $username;
   $email = $_POST['email'];
//    echo $email;
   $phonenumber = $_POST['phonenumber'];
//    echo $phonenumber;
   $address = $_POST['address'];
//    echo $address;
   $avatar = $_FILES["avatar"]["name"];
   $_SESSION['images'] = $avatar;
//    var_dump($avatar);exit;
// echo $avatar;
   $id = $_SESSION['user_id'];
//    echo $id;exit;
  
   $sql = "UPDATE customer 
   SET Fullname = '$fullname', Phone = '$phonenumber', Email = '$email', Username = '$username', Address = '$address', images = '$avatar' 
   WHERE CustomerID = $id";
   

//  echo $sql;exit;

   $target_dir = "images_customer/";  //chon thu muc luu file
   $target_file = $target_dir . basename($_FILES["avatar"]["name"]);  //duong dan thu muc duoc tai len
   $uploadOk = 1;  //dung de kiem tra cac dieu kien
   $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
   
   
   
   // echo '<pre>';
//    var_dump($_FILES["avatar"]);exit;
  
     
     
     // kiem tra xem tep da ton taij chua
     if (file_exists($target_file)) {
         echo "Sorry, file already exists.";
         $uploadOk = 0;
         exit;
       }
   
   // Check size
   if ($_FILES["avatar"]["size"] > 500000) {
       echo "Sorry, your file is too large.";
       $uploadOk = 0;
       exit;
     }
     
     // cac dinh dang duoc phep
     if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
     && $imageFileType != "gif" ) {
       echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
       $uploadOk = 0;
       exit;
     }
     
     // Check if $uploadOk is set to 0 by an error
     if ($uploadOk == 0) {
       echo "Sorry, your file was not uploaded.";
     // if everything is ok, try to upload file
     } else {
       if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
         // echo "The file ". htmlspecialchars( basename( $_FILES["upload_file"]["name"])). " has been uploaded.";
       } else {
         echo "Sorry, there was an error uploading your file.";
         exit;
       }
     }
   
   
      
   
   
   
      mysqli_query($con, $sql);
      
     ?>