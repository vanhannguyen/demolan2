<?php
   session_start();
   require_once './connect.php';

   
   
  //  var_dump($_GET['id']);die;
   $sql = "SELECT * FROM `product` WHERE `ProductID`=".$_GET['id'];
   $result = mysqli_query($con,$sql);
  


  
  

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/product_detail.css">
</head>
<body>
<?php while($product = mysqli_fetch_assoc($result)) { 
    ?>
    <div class="container flex">
      <div class="left">
        <div class="main_image">
          <img style="width: 100%;" src="images_product/<?php echo $product['images'];  ?>" class="slide">
        </div>
        <!-- <div class="option flex">
          <img src="image/p1.jpg" onclick="img('image/p1.jpg')">
          <img src="image/p2.jpg" onclick="img('image/p2.jpg')">
          <img src="image/p3.jpg" onclick="img('image/p3.jpg')">
          <img src="image/p4.jpg" onclick="img('image/p4.jpg')">
          <img src="image/p5.jpg" onclick="img('image/p5.jpg')">
          <img src="image/p6.jpg" onclick="img('image/p6.jpg')">
        </div> -->
      </div>
      <div class="right">
        <h3><?php echo $product['ProductName'];  ?></h3>
        <h4> <small>$</small><?php echo $product['PriceOutput'];  ?></h4>
        <p><?php echo $product['ContentDetail'];  ?></p>
        <!-- <h5>Color-Rose Gold</h5>
        <div class="color flex1">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
        </div> -->
        <form id="add-to-cart-form" action="cart.php?action=add" method="POST">
        <div class="sizes mt-5">
                                <h6 class="text-uppercase">Size</h6> <label class="radio"> <input name="size" type="radio" name="size" value="S" checked> <span>S</span> </label> <label class="radio"> <input name="size" type="radio" name="size" value="M"> <span>M</span> </label> <label class="radio"> <input name="size" type="radio" name="size" value="L"> <span>L</span> </label> <label class="radio"> <input name="size" type="radio" name="size" value="XL"> <span>XL</span> </label> <label class="radio"> <input name="size" type="radio" name="size" value="XXL"> <span>XXL</span> </label>
                            </div>
        <div class="">
          <label for="">Quantity</label>
          <input name="quantity[<?php echo $product['ProductID'];  ?>]" type="number" placeholder="1" value="1" style="width: 40px; margin-top: 33px;">
        </div>
        <div class="">
          <label for="">Status</label>
          <input  type="number" placeholder="" value="<?php echo $product['Status'];  ?>" style="width: 60px; margin-top: 33px;" readonly>
        </div>
        <button name="submit" >Add to Bag</button>
      </div>
        </form>
    </div>
  <?php } ?> 
  <script>
    function img(anything) {
      document.querySelector('.slide').src = anything;
    }

    function change(change) {
      const line = document.querySelector('.home');
      line.style.background = change;
    }
  </script>
</body>
</html>