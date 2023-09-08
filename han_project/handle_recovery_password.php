<?php
if (isset($_POST['dangnhap'])) {

    session_start();
    header('Content-Type: text/html; charset=UTF-8');
    require_once './connect.php';
    //Lấy dữ liệu nhập vào
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // echo $email;
    // echo $password;
    
    
    //kiem tra user co nhap day du du lieu
     if (!$email || !$password) {
          echo "Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu";
         exit;
       }
    
     $password = md5($password);

    
    $sql = "UPDATE customer SET Password = '$password' WHERE Email = '$email'";
   
}  mysqli_query($con, $sql);

header('Location: ./signin.php');
?>