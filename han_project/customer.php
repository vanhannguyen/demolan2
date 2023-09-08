<?php
   session_start();
   require_once './connect.php';
 

   if (!$_SESSION['user_name']) {
    header('location: ./signin.php');
   }
   

   

   
   
   
   $sql = "SELECT * FROM orders";
   $result = mysqli_query($con,$sql);


   
   ?>
  




<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title><?php echo $_SESSION['user_name'] ?></title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel="stylesheet" href="css/customer.css">

</head>
<body>
<!-- partial:index.partial.html -->
<!-- <a href="./home.php">Home</a> -->
<div class="demo-page">
  <div class="demo-page-navigation">
    <nav>
      <ul>
        <li>
          <a href="./home.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-tool">
              <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z" />
            </svg>
          Home</a>
        </li>
        <li>
          <a href="#information">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-tool">
              <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z" />
            </svg>
            Information</a>
        </li>
        <li>
          <a href="#addproduct">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers">
              <polygon points="12 2 2 7 12 12 22 7 12 2" />
              <polyline points="2 17 12 22 22 17" />
              <polyline points="2 12 12 17 22 12" />
            </svg>
            Add Products</a>
        </li>
        <li>
          <a href="#orderslist">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers">
              <polygon points="12 2 2 7 12 12 22 7 12 2" />
              <polyline points="2 17 12 22 22 17" />
              <polyline points="2 12 12 17 22 12" />
            </svg>
            My order list</a>
        </li>
        <li>
          <a href="#editprofile">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-align-justify">
              <line x1="21" y1="10" x2="3" y2="10" />
              <line x1="21" y1="6" x2="3" y2="6" />
              <line x1="21" y1="14" x2="3" y2="14" />
              <line x1="21" y1="18" x2="3" y2="18" />
            </svg>
            Edit Profile</a>
        </li>

        <li>
          <a href="#recovery_password">
            <svg  width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-feather">
              <path d="M20.24 12.24a6 6 0 0 0-8.49-8.49L5 10.5V19h8.5z" />
              <line x1="16" y1="8" x2="2" y2="22" />
              <line x1="17.5" y1="15" x2="9" y2="15" />
            </svg>
            Recovery password</a>
        </li>
        <li>
          <a href="#feedback">
            <svg  width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-server">
              <rect x="2" y="2" width="20" height="8" rx="2" ry="2" />
              <rect x="2" y="14" width="20" height="8" rx="2" ry="2" />
              <line x1="6" y1="6" x2="6.01" y2="6" />
              <line x1="6" y1="18" x2="6.01" y2="18" />
            </svg>
            Feedback</a>
        </li>
        <li>
          <a href="#logout">
            <svg  width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-power">
              <path d="M18.36 6.64a9 9 0 1 1-12.73 0" />
              <line x1="12" y1="2" x2="12" y2="12" />
            </svg>
            Log out</a>
        </li>
        
      </ul>
    </nav>
  </div>
  <main class="demo-page-content">
    <section>
      <div class="href-target" id="intro"></div>
      <h1 class="package-name">Welcome</h1>
      <p>
      welcome to hanshop below are the functions
      </p>
      
    </section>

    <section>
      <div class="href-target" id="information"></div>
      <h1>
            Information
          </h1>
          
    
          <div class="nice-form-group">
            <label>Fullname</label>
            <input  name="fullname" type="text" placeholder="<?php echo $_SESSION['Fullname']?>" value="<?php echo $_SESSION['Fullname']?>" readonly />
          </div>
          
          <div class="nice-form-group">
            <label>Username</label>
            <input name="username" type="text" placeholder="<?php echo $_SESSION['user_name']?>" value="<?php echo $_SESSION['user_name']?>" readonly />
          </div>
    
          <div class="nice-form-group">
            <label>Email</label>
            <input name="email" type="email" placeholder="<?php echo $_SESSION['user_email']?>" value="<?php echo $_SESSION['user_email']?>" readonly />
          </div>
    
          <div class="nice-form-group">
            <label>Phone number</label>
            <input name="phonenumber" type="tel" placeholder="<?php echo $_SESSION['user_phone']?>" value="<?php echo $_SESSION['user_phone']?>" readonly />
          </div>
    
          <div class="nice-form-group">
            <label>Address</label>
            <input name="address" type="text" placeholder="<?php echo $_SESSION['Address']?>" value="<?php echo $_SESSION['Address']?>" readonly />
          </div>
    
    </section>



    <form action="./handle_addproduct.php" method="post" enctype="multipart/form-data">
        <section>
          <div class="href-target" id="addproduct"></div>
          <h1>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers">
              <polygon points="12 2 2 7 12 12 22 7 12 2" />
              <polyline points="2 17 12 22 22 17" />
              <polyline points="2 12 12 17 22 12" />
            </svg>
            Add Products
          </h1>
    
          <div class="nice-form-group">
            <label>Product name</label>
            <input type="text" name="productname" id="productname" placeholder="Enter productname">
          </div>
    
          <div class="nice-form-group">
            <label>Content</label>
            <small>Information of your product</small>
            <input type="text" name="content" id="content" placeholder="Enter content"><br><br>
            <input type="text" name="contentdetail" id="contentdetail" placeholder="Enter contentdetail">
          </div>
    
          <div class="nice-form-group">
            <label>Price</label>
            <small>Information of your product</small>
            <input type="text" name="priceinput" id="priceinput" placeholder="Enter priceinput"><br><br>
            <input type="text" name="priceoutput" id="priceoutput" placeholder="Enter priceoutput">
          </div>
    
    
          <div class="nice-form-group">
            <label>Size & Color</label>
            <small>Information of your product</small>
            <input type="text" name="size" id="size" placeholder="Nhap ma size"><br><br>
            <input type="text" name="color" id="color" placeholder="Enter color">
          </div>

    
          <div class="nice-form-group">
            <label>Product images</label>
            <input type="file" name="upload_file"  id="upload_file">
          </div>
    
          <div class="nice-form-group">
            <label>Status</label>
            <input type="number" name="status" id="status" placeholder="Enter status"><br><br>
            <input type="checkbox" name="checkbox"> Do you agree to our <a href="terms.php">terms</a> ?
          </div>
    
          <button class="toggle-code" type="submit"  name="submit">Add product</button>
        </section>

    </form>

    <section>
          <div class="href-target" id="orderslist"></div>
          <h1>My Orders list</h1>
          <?php while($product = mysqli_fetch_assoc($result)) { 
    ?>
       
       <form action="orders_printing.php" method="POST">
          

          
        <input name="id_order" type="hidden" value="<?php echo $product['id'];  ?>">
        <?php $time = date('Y-m-d H:i:s', $product['created_time']);?>
        <button class="toggle-code" name="" type="submit">My order at <?php echo $time;  ?></button>
      </form><br>

       <?php }?>
        </section>

  
    


    <form action="handle_editprofile.php" method="post" enctype="multipart/form-data">
        
        <section>
          <div class="href-target" id="editprofile"></div>
          <h1>
            Edit Profile
          </h1>
          <p>All available input types are included</p>
    
          <div class="nice-form-group">
            <label>Fullname</label>
            <input name="fullname" type="text" placeholder="<?php echo $_SESSION['Fullname']?>" value="<?php echo $_SESSION['Fullname']?>" />
          </div>
          
          <div class="nice-form-group">
            <label>Username</label>
            <input name="username" type="text" placeholder="<?php echo $_SESSION['user_name']?>" value="<?php echo $_SESSION['user_name']?>" />
          </div>
    
          <div class="nice-form-group">
            <label>Email</label>
            <input name="email" type="email" placeholder="<?php echo $_SESSION['user_email']?>" value="<?php echo $_SESSION['user_email']?>" />
          </div>
    
          <div class="nice-form-group">
            <label>Phone number</label>
            <input name="phonenumber" type="tel" placeholder="<?php echo $_SESSION['user_phone']?>" value="<?php echo $_SESSION['user_phone']?>" />
          </div>
    
          <div class="nice-form-group">
            <label>Address</label>
            <input name="address" type="text" placeholder="<?php echo $_SESSION['Address']?>" value="<?php echo $_SESSION['Address']?>" />
          </div>
    
          <div class="nice-form-group">
            <label>Avatar</label>
            <input name="avatar" type="file"/>
          </div>
          
          
          <button name="submit" class="toggle-code">Update</button>
        </section>
    </form>
<form action="" method="post">
    <section>
      <div class="href-target" id="recovery_password"></div>
      <h1>
        Recovery Password
        </h1>
        <small>   <?php
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
    
 mysqli_query($con, $sql);
    echo "Change password successfully!";
    }


?>
        </small>
      
      

      <div class="nice-form-group">
        <label>Email</label>
        <input type="email" name="email" id="email" placeholder="Enter email">
      </div>

      <div class="nice-form-group">
        <label>Password</label>
        <input type="password" name="password" id="inputPassword" placeholder="New password">
            <span id="showPassword">
                <ion-icon name="eye-outline"></ion-icon>
                <ion-icon name="eye-off-outline"></ion-icon>

            </span>
      </div>
     
      <button name="dangnhap" type="submit" autocomplete = "off" class="toggle-code">Update</button>
      
    </section>

    </form>

    <section>
      <div class="href-target" id="feedback"></div>
      <h1>
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-server">
          <rect x="2" y="2" width="20" height="8" rx="2" ry="2" />
          <rect x="2" y="14" width="20" height="8" rx="2" ry="2" />
          <line x1="6" y1="6" x2="6.01" y2="6" />
          <line x1="6" y1="18" x2="6.01" y2="18" />
        </svg>
        Feedback
      </h1>

      <div class="nice-form-group">
        <label></label>
        <textarea rows="5" placeholder="Your feedback"></textarea>
      </div>

      <button autocomplete = "off" class="toggle-code">Submit</button>

    </section>

    <section>
      <div class="href-target" id="logout"></div>
      <h1>Log out</h1>

      <a href="./logout.php" class="to-reset" target="_blank">
        <svg  width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-external-link">
          <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6" />
          <polyline points="15 3 21 3 21 9" />
          <line x1="10" y1="14" x2="21" y2="3" />
        </svg>
        Log out!
      </a>
    </section>

    

    

    
  </main>
</div>
<!-- partial -->
<script src="js/recovery_password.js"></script>
</body>
</html>
