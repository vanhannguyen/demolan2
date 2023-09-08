
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
            We're so excited to see you again! <br>
        </div>
        <form action="" method="POST" autocomplete = "off" >
        <div class="group">
            <input type="email" name="email" id="email" placeholder="Enter email">
        </div>
        <div class="group">
            <input type="password" name="password" id="inputPassword" placeholder="Enter password">
            <span id="showPassword">
                <ion-icon name="eye-outline"></ion-icon>
                <ion-icon name="eye-off-outline"></ion-icon>

            </span>
        </div>
        <div class="recovery">
            <a href="recovery_password.php">Recovery password</a>
        </div>
        <div class="signIn">
            <button type="submit" name="dangnhap">Sign In</button>
            
        </div>
        <br>
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
        
        <p class="canhbao"><?php
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
          echo "Enter enough information!";
          exit;
       }
    
     $password = md5($password);
    
    $sql = "SELECT * FROM customer WHERE Email='$email'";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
         // Load dữ liệu lên website
         while($row = $result->fetch_assoc()) {
               if($password == $row["Password"]){
                $_SESSION['Fullname'] = $row['Fullname'];
                $_SESSION['user_id'] = $row["CustomerID"];
                $_SESSION['user_phone'] = $row["Phone"];
                $_SESSION['user_email'] = $row["Email"];
                $_SESSION['user_name'] = $row["Username"];
                $_SESSION['Introduct'] = $row["Introduct"];
                $_SESSION['Address'] = $row["Address"];
                $_SESSION['images'] = $row["images"];
                   header('location: ./home.php');
               }else {
                echo "Login information is incorrect!";
              }
           }
           } else {
      echo "Login information is incorrect!";
    }
   
}
        ?></p> 
    </div>
 










<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="js/signin.js"></script>
</body>
</html>
