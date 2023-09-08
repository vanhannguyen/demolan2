<?php
   session_start();
   require_once './connect.php';




   
   
   $customerID = $_SESSION['user_id'];
   $nameproduct = $_POST['productname'];
   $content = $_POST['content'];
   $contentdetail = $_POST['contentdetail'];
   $priceinput= $_POST['priceinput'];
   $priceoutput= $_POST['priceoutput'];
   $created = date("Y-m-d");
   $images = $_FILES["upload_file"]["name"];
   // echo $images;
   $status = $_POST["status"];
   $size = $_POST['size'];
   $color = $_POST['color'];
   // var_dump($_POST["upload_file"]["name"]) ;die;
   // // var_dump($_FILES);die;
   // echo $images;
  
  $sql = "INSERT INTO product(ProductName, CustomerID, Content, ContentDetail, PriceInput, PriceOutput, Size, Color,Created, Status, images) 
  VALUES ('$nameproduct','$customerID','$content','$contentdetail','$priceinput','$priceoutput','$size','$color',' $created','$status','$images')";

$target_dir = "images_product/";  //chon thu muc luu file
$target_file = $target_dir . basename($_FILES["upload_file"]["name"]);  //duong dan thu muc duoc tai len
$uploadOk = 1;  //dung de kiem tra cac dieu kien
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));



// echo '<pre>';
// var_dump($_FILES["upload_file"]);
$check = getimagesize($_FILES["upload_file"]["tmp_name"]);
// var_dump($check);



// kiem tra xem file co phai hinh anh hay kh
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["upload_file"]["tmp_name"]);  // getimagesize() la ham dung de lay kich thuoc va thong tin
    if($check !== false) {
      // echo "Day la file anh" . $check["mime"] . ".";
      $uploadOk = 1;
    } else {
      echo "Day khong phai file anh";
      $uploadOk = 0;
      exit;
    }
  }
  
  
  
  // kiem tra xem tep da ton taij chua
  // if (file_exists($target_file)) {
  //     echo "Sorry, file already exists.";
  //     $uploadOk = 0;
  //     exit;
  //   }

// Check size
if ($_FILES["upload_file"]["size"] > 500000) {
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
    if (move_uploaded_file($_FILES["upload_file"]["tmp_name"], $target_file)) {   ?>
      
      <div id="notify-msg">
        <h1>Success!</h1>
                    <?= $error ?>. <a href="javascript:history.back()">Back</a>
                </div>

                <?php
    } else {
      echo "Sorry, there was an error uploading your file.";
      exit;
    }
  }


   



   mysqli_query($con, $sql);
   
  ?>