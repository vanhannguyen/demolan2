<?php
   session_start();
   require_once './connect.php';

   
   
   
   $sql = "SELECT * FROM product";
   $result = mysqli_query($con,$sql);


   $sql_product_type1 = "SELECT * FROM product WHERE ProductTypeID = 1";
   $result1 = mysqli_query($con,$sql_product_type1);


   $sql_product_type2 = "SELECT * FROM product WHERE ProductTypeID = 2";
   $result2 = mysqli_query($con,$sql_product_type2);


   if (!$_SESSION['user_name']) {
    header('location: ./signin.php');
   }

   ?>


 
   
   
  
  
      

   



   
   










<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>
<body>
<div>
    <div class="noidung" style="
        position: absolute;
        z-index: 12;
        width: 100%;">
        <div class="chua">
            <a href="./home.php">
            <div class="logo">
                <img src="images/logo.jpg" alt="">
            </div>
            </a>
            <div class="menu">
                <nav>
                    <ul>
                        <li><a href="#clothes">Clothes</a></li>
                        <li><a href="#shoes">Shoes</a></li>
                        <li><a href="#hats">Hats</a></li>
                        <li><a href="#balo">Balo</a></li>
                        <li><a href="#fashion accessories">Fashion accessories</a></li>
                        <li><a href="./cart.php"><i class="fa fa-shopping-basket" aria-hidden="true"></i></a></li>
                        
                    </ul>
                </nav>
            </div>
            <a href="customer.php">
            <div class="more">
                <br>
               <img src="images_customer/<?php echo $_SESSION['images'] ?>" alt="" style="width: 36px; margin-left: 23px;">
               <p><?php echo $_SESSION['user_name'] ?></p>
            </div>
            </a>
         </div>
     </div>
     <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="images/0001.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="images/0002.jpg" class="d-block w-100" alt="...">
                </div>
               <div class="carousel-item">
                   <img src="images/0003.jpg" class="d-block w-100" alt="...">
               </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
               <span class="carousel-control-prev-icon" aria-hidden="true"></span>
               <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
               <span class="carousel-control-next-icon" aria-hidden="true"></span>
               <span class="visually-hidden">Next</span>
            </button>
    </div>

</div>


<div id="clothes"></div>


<div id="clothes" class="containermy">
     <div class="banner" id="home">
            <div class="content">
                <p>NHỮNG SẢN PHẨM MỚI NHẤT NĂM 2023</p>
                <h1>
                    Quần Áo Unisex<br/>
                    <div class="gradientText">
                        
                    </div>
                </h1>
                <p>
                Thời trang quần áo hiện đại có thể được may từ nhiều loại vật liệu khác nhau: vải dệt thoi, vải dệt kim, vải không dệt, da lông tự nhiên và nhân tạo. Thông thường, quần áo được làm từ vải hoặc vải dệt. 
                </p>
                <a href="#producttype1">
                    <button class="action re-blacked"> 
                        <span>Learn more</span> 
                </button>
                </a>
            </div>
            <div class="mauanh2">
                <img src="images/quanao.png" alt="">
            </div>
   </div>
</div>



<br>

<div id="producttype1" class="swiper mySwiper thecard">
    <div class="swiper-wrapper">
   <?php while($sql_product_type1 = mysqli_fetch_assoc($result1)) { 
    ?>
<div class="swiper-slide">
<div class="card swiper-slide swiper-slide-active"  id="card_14" role="group" aria-label="1 / 10" data-swiper-slide-index="0">
       <div class="basicInfo">
           <div class="title">
               <div class="category"></div>
               <div class="name"><?php echo $sql_product_type1['ProductName'];  ?></div>
               <div class="info"><?php echo $sql_product_type1['Created'];  ?></div>
               <div class="info">.</div>
           </div>
           <div class="images">
                   <div class="img">
                       <div class="item" style="margin: 12%;">
                           <input type="radio" name="color" id="" checked>
                           <img src="images_product/<?php echo $sql_product_type1['images'];  ?>">
                       </div>
                       
                   </div>
               </div>
               <div class="chitiet">
                   <a href="./product_detail.php?id=<?php echo $sql_product_type1['ProductID'];?>">
                   <label for="more">
                       <div class="name" style="color: black;" >More</div>
                       <div class="ellipse" style="background:#2B2B2B">
                       <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                       <div><p></p></div>
                    </div>
                   </label>
                   </a>
               </div>
           <div class="addCard">
               <!-- <i class="fa-solid fa-basket-shopping"></i> -->
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
           <div class="price">$<?php echo $sql_product_type1['PriceOutput'];  ?></div>
        </div>
   </div>
</div>
<?php } ?> 
      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-pagination"></div>
    </div>



<div  class="khoanggiua"></div>
<div id="shoes"></div>

<div class="containermy">
    <div class="banner" id="home">
        <div class="content">
            <p>NHỮNG SẢN PHẨM MỚI NHẤT NĂM 2023</p>
            <h1>
                Qiày dép Cao cấp <br/>
                <div class="gradientText">
                    
                    </div>
                </h1>
                <p>
                Giày chạy bộ ASICS Gel-Kayano 29 là một đôi giày được thiết kế để mang lại sự thoải mái và hỗ trợ cho người chạy bộ.
Giày bóng rổ ASICS Gel-Lyte III là một đôi giày cổ điển được thiết kế để mang lại sự thoải mái và linh hoạt cho người chơi bóng rổ.

                    <!-- Thời trang quần áo hiện đại có thể được may từ nhiều loại vật liệu khác nhau: vải dệt thoi, vải dệt kim, vải không dệt, da lông tự nhiên và nhân tạo. Thông thường, quần áo được làm từ vải hoặc vải dệt.  -->
                </p>
                <a href="">
                <a href="#producttype2">
                    <button class="action re-blacked"> 
                        <span>Learn more</span> 
                </button>
                </a>
        </div>
        <div class="mauanh2">
            <img src="images/giaydemo.jpg" alt="">
        </div>
    </div>
</div>


<br>
<div id="producttype2" class="swiper mySwiper thecard">
    <div class="swiper-wrapper">
   <?php while($sql_product_type2 = mysqli_fetch_assoc($result2)) { 
    ?>
<div class="swiper-slide">
<div class="card swiper-slide swiper-slide-active"  id="card_14" role="group" aria-label="1 / 10" data-swiper-slide-index="0">
       <div class="basicInfo">
           <div class="title">
               <div class="category"></div>
               <div class="name"><?php echo $sql_product_type2['ProductName'];  ?></div>
               <div class="info"><?php echo $sql_product_type2['Created'];  ?></div>
               <div class="info">.</div>
           </div>
           <div class="images">
                   <div class="img">
                       <div class="item" style="margin: 12%;">
                           <input type="radio" name="color" id="" checked>
                           <img src="images_product/<?php echo $sql_product_type2['images'];  ?>">
                       </div>
                       
                   </div>
               </div>
               <div class="chitiet">
                   <a href="./product_detail.php?id=<?php echo $sql_product_type2['ProductID'];?>">
                   <label for="more">
                       <div class="name" style="color: black;" >More</div>
                       <div class="ellipse" style="background:#2B2B2B">
                       <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                       <div><p></p></div>
                    </div>
                   </label>
                   </a>
               </div>
           <div class="addCard">
               <!-- <i class="fa-solid fa-basket-shopping"></i> -->
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
           <div class="price">$<?php echo $sql_product_type2['PriceOutput'];  ?></div>
        </div>
   </div>
</div>
<?php } ?> 
      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-pagination"></div>
    </div>



<div class="khoanggiua"></div>




<div class="containermy">
    <div class="banner" id="home">
        <div class="content">
            <p>BẠN CÓ THỂ ĐĂNG BÁN SẢN PHẨM TẠI ĐÂY</p>
                <a href="./customer.php#addproduct">
                    <button class="action re-blacked"> 
                        <span>Add new products</span> 
                </button>
            </a>
        </div>
        <div class="mauanh2">
            <img class="anhm" src="images/giaydemo.jpg" alt="">
        </div>
    </div>
</div>




<div class="swiper mySwiper thecard">
    <div class="swiper-wrapper">
   <?php while($product = mysqli_fetch_assoc($result)) { 
    ?>
<div class="swiper-slide">
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
                       <div class="item" style="margin: 12%;">
                           <input type="radio" name="color" id="" checked>
                           <img src="images_product/<?php echo $product['images'];  ?>">
                       </div>
                       
                   </div>
               </div>
               <div class="chitiet">
                   <a href="./product_detail.php?id=<?php echo $product['ProductID'];?>">
                   <label for="more">
                       <div class="name" style="color: black;" >More</div>
                       <div class="ellipse" style="background:#2B2B2B">
                       <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                       <div><p></p></div>
                    </div>
                   </label>
                   </a>
               </div>
           <div class="addCard">
               <!-- <i class="fa-solid fa-basket-shopping"></i> -->
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
<?php } ?> 
        <div class="swiper-slide">Slide 5</div>
        <div class="swiper-slide">Slide 6</div>
        <div class="swiper-slide">Slide 7</div>
        <div class="swiper-slide">Slide 8</div>
        <div class="swiper-slide">Slide 9</div>
      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-pagination"></div>
    </div>

<div class="khoanggiua"></div>
<footer class="page_footer" style="
    width: 100%;
    height: 200px;
    background-color: #24292b;
">

</footer>




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