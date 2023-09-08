<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/home.css">
</head>
<body>
<?php
   session_start();
   require_once './connect.php';

   
   
   
   $sql = "SELECT * FROM product";
   $result = mysqli_query($con,$sql);

   ?>

   <?php while($product = mysqli_fetch_assoc($result)) { 
    ?>

<div class="card swiper-slide" id="card_14">
       
       <div class="basicInfo">
           <div class="title">
               <div class="category"></div>
               <div class="name"><?php echo $product['ProductName'];  ?></div>
               <div class="info"><?php echo $product['Created'];  ?><</div>
           </div>
           <div class="images">
               <div class="img">
                   <div class="item">
                       <input type="radio" name="color" id="green" checked>
                       <img src="images/giayxanh.PNG">
                   </div>
                   
               </div>
           </div>
           <div class="colors">
               <label for="green">
                   <div class="name">Green</div>
                   <div class="ellipse" style="background:#CADB6E"></div>
               </label>
   
               <label for="black">
                   <div class="name">Black</div>
                   <div class="ellipse" style="background:#2B2B2B"></div>
               </label>
           </div>
           <div class="addCard">
               <i class="fa-solid fa-basket-shopping"></i>
           </div>
       </div>
       <div class="mores">
           <div class="stars">
               <i class="fa-regular fa-star text-yellow"></i>
               <i class="fa-regular fa-star text-yellow"></i>
               <i class="fa-regular fa-star text-yellow"></i>
               <i class="fa-regular fa-star text-yellow"></i>
               <i class="fa-regular fa-star"></i>
           </div>
           <div class="price"><?php echo $product['PriceOutput'];  ?></div>
        </div>
   </div>
<?php } ?> 




<!-- Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
  var swiper = new Swiper(".mySwiper", {
    slidesPerView: 3,
    spaceBetween: 30,
    slidesPerGroup: 3,
    loop: true,
    loopFillGroupWithBlank: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>





<div class="card swiper-slide swiper-slide-active"  id="card_14" role="group" aria-label="1 / 10" data-swiper-slide-index="0">
       <div class="basicInfo">
           <div class="title">
               <div class="category"></div>
               <div class="name"><?php echo $product['ProductName'];  ?></div>
               <div class="info"><?php echo $product['Created'];  ?></div>
               <div class="info">.</div>
           </div>
           <div class="images">
                   <div class="img">
                       <div class="item">
                           <input type="radio" name="color" id="" checked>
                           <img src="images/aoxanh.PNG">
                       </div>
                       
                   </div>
               </div>
               <div class="chitiet">
                   <a href="">
                   <label for="more">
                       <div class="name" style="color: black;" >More</div>
                       <div class="ellipse" style="background:#2B2B2B">
                       <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                       
                    </div>
                   </label>
                   </a>
               </div>
           <div class="addCard">
               <i class="fa-solid fa-basket-shopping"></i>
           </div>
       </div>
       <div class="mores">
       <div class="stars" style="margin-right: 50px;">
               <i class="fa-regular fa-star text-yellow"></i>
               <i class="fa-regular fa-star text-yellow"></i>
               <i class="fa-regular fa-star text-yellow"></i>
               <i class="fa-regular fa-star text-yellow"></i>
               <i class="fa-regular fa-star"></i>
           </div>
           <div class="price">$<?php echo $product['PriceOutput'];  ?></div>
        </div>
   </div>
</div>