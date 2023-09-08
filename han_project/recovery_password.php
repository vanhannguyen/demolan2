<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/recovery_password.css">
</head>
<body>
    <div class="login">
    <div class="title">Wellcom to HanShop!</div>
        <form action="" method="POST">
        <div class="des">
            xin moi nhap mat khau moi <br>
        </div>
        <div class="group">
            <input type="email" name="email" id="email" placeholder="Enter email">
        </div>
        <div class="group">
            <input type="password" name="password" id="inputPassword" placeholder="New password">
            <span id="showPassword">
                <ion-icon name="eye-outline"></ion-icon>
                <ion-icon name="eye-off-outline"></ion-icon>

            </span>
            
        </div>
        <div class="recovery">
            <a href="signin.php">I remember the password!</a>
        </div>
        <div class="signIn">
            <button type="submit" autocomplete = "off"  name="dangnhap">Save</button>
        </div>
        </form>
        <!-- <div class="or">Or continue with</div>
        <div class="list">
            <div class="item">
                <img src="images/fb.jpg" alt="">
            </div>
            <div class="item">
                <img src="images/gg.png" alt="">
            </div>
            <div class="item">
                <img src="images/sw.png" alt="">
            </div>
        </div> -->
        <div class="register">
            Not a account? <a href="signup.php">Register</a>
        </div>
        <p class="canhbao">
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
    header('Location: ./signin.php');
   
}  mysqli_query($con, $sql);


?>
        </p>
    </div>
 










<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="js/recovery_password.js"></script>
</body>
</html>