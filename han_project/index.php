
<?php
 if ($_SESSION['user_name']) {
  header('location: ./home.php');
 }

?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Information Card Slider</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons'>

      <link rel="stylesheet" href="css/start.css">
    

  
</head>

<body>
  
<div class="card">
  <div class="products">
    
    <div class="product" product-id="3" product-color="#A5AAAE">
      <h1 class="title">HanShop</h1><br>
      <p class="description">Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
    </div>

  </div>
  <div class="footer"><a class="btn" id="next" href="signin.php" ripple="" ripple-color="#666666">Next</a></div>
</div>
 

</body>
</html>