<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/signup.css">
</head>
<body>
    <div class="login">
    <div class="title">Create an account</div>
        <form action="./handle_create_account.php" method="POST">
        <!-- <div class="des">
            Create an account <br>
        </div> -->
        <div class="group">
            <input type="text" name="number" id="number" placeholder="Enter number">
        </div>
        <div class="group">
            <input type="email" name="email" id="email" placeholder="Enter email">
        </div>
        <div class="group">
            <input type="text" name="username" id="username" placeholder="Enter username">
        </div>
        <div class="group">
            <input type="password" name="password" id="inputPassword" placeholder="Enter password">
            <span id="showPassword">
                <ion-icon name="eye-outline"></ion-icon>
                <ion-icon name="eye-off-outline"></ion-icon>

            </span>
        </div>
        <div class="recovery">
            <a href="signin.php">I have a account!</a>
        </div>
        <div class="signIn">
            <button>Continue</button>
        </div>
        <div class="or">Or continue with</div>
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
        </div>
        </form>
        
    </div>
 










<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="js/signup.js"></script>
</body>
</html>