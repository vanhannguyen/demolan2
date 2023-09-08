<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/cart.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
</head>
<body>
<!-- <a href="./home.php">Back</a> -->
    <?php

    session_start();
    require_once './connect.php';
    

    if (!isset($_SESSION['mau'])) {
        $_SESSION['mau'] = array();
    }
    if (isset($_GET['action'])) {

        function update_cart($add = false){
            foreach ($_POST['quantity'] as $id => $quantity) {
                if($quantity == 0){
                    // var_dump($quantity);exit;
                    unset($_SESSION['mau'][$id]);
                    


                }
                if ($add) {
                    $_SESSION['mau'][$id] += $quantity;
                }else{
                    $_SESSION['mau'][$id] = $quantity;
                }
              }
        }


        $error = false;
        $success = false;

        switch ($_GET['action']) {
         case 'add':
            update_cart(true);
           foreach ($_POST['quantity'] as $id => $quantity) {
             $_SESSION['mau'][$id] = $quantity;
           }
           header('Location: ./cart.php');
           //    var_dump($_SESSION['mau']); 
           break;
        
        case "delete":
            if (isset($_GET['id'])) {
                unset($_SESSION['mau'][$_GET['id']]);
            }
            header('Location: ./cart.php');
            break;

        case "submit":
            if (isset($_POST['order_click'])) {
                // var_dump($_POST);exit;
                if (empty($_POST['name'])) {
                    $error = "You did not enter the recipient's name";
                } elseif (empty($_POST['phone'])) {
                    $error = "You have not entered the recipient's phone number";
                } elseif (empty($_POST['address'])) {
                    $error = "You have not entered the recipient address";
                } elseif (empty($_POST['quantity'])) {
                    $error = "Empty shopping cart";
                }



                
                //lưu vào database
                if ($error == false && !empty($_POST['quantity'])) { //Xử lý lưu giỏ hàng vào db
                    // echo "Lưu vào database"; exit;
                    $products = mysqli_query($con, "SELECT * FROM `product` WHERE `ProductID` IN (" . implode(",", array_keys($_POST['quantity'])) . ")");
                    $total = 0;
                    $orderProducts = array();
                    while ($row = mysqli_fetch_array($products)) {
                        $orderProducts[] = $row;
                        $total += $row['PriceOutput'] * $_POST['quantity'][$row['ProductID']];
                    }
                    // var_dump($total);exit;
                    $insertOrder = mysqli_query($con, "INSERT INTO `orders` (`id`, `name`, `phone`, `address`, `note`, `total`, `created_time`, `last_updated`) VALUES (NULL, '" . $_POST['name'] . "', '" . $_POST['phone'] . "', '" . $_POST['address'] . "', '" . $_POST['note'] . "', '" . $total . "', '" . time() . "', '" . time() . "');");
                    $orderID = $con->insert_id;
                    $insertString = "";
                    foreach ($orderProducts as $key => $product) {
                        $insertString .= "(NULL, '" . $orderID . "', '" . $product['ProductID'] . "', '" . $_POST['quantity'][$product['ProductID']] . "', '" . $product['PriceOutput'] . "', '" . time() . "', '" . time() . "')";
                        if ($key != count($orderProducts) - 1) {
                            $insertString .= ",";
                        }
                    }
                    $insertOrder = mysqli_query($con, "INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_time`, `last_updated`) VALUES " . $insertString . ";");
                    $success = "Đặt hàng thành công";
                    unset($_SESSION['mau']);
                }



            }else if(isset($_POST['update_click'])){
                update_cart();
                // header('Location: ./cart.php');
            }
        break;



        }

    }
    if (!empty($_SESSION['mau'])) {
        // "SELECT * FROM `product` WHERE `ProductID` IN (28,31,9)"
        // echo ("<pre>");
        // var_dump("SELECT * FROM `product` WHERE `ProductID` IN (".implode(",",array_keys($_SESSION['mau'])).")");exit;
        $products = mysqli_query($con,"SELECT * FROM `product` WHERE `ProductID` IN (".implode(",",array_keys($_SESSION['mau'])).")");
        // var_dump($result );
    }


    
    ?>
    <div class="container">
            <?php if (!empty($error)) { ?> 
                <div id="notify-msg">
                    <?= $error ?>. <a href="javascript:history.back()">Back</a>
                </div>
            <?php } elseif (!empty($success)) { ?>
                <div id="notify-msg">
                    <?= $success ?>. <a href="home.php">Tiếp tục mua hàng</a>
                </div>
            <?php } else { ?>
                <form id="cart-form" action="./cart.php?action=submit" method="POST">

<div class="container mt-4 p-0">
    
    <div class="row px-md-4 px-2 pt-4">
        <div class="col-lg-8">





            <p class="pb-2 fw-bold">Order</p>
            <div class="card">
                <div>
                    <div class="table-responsive px-md-4 px-2 pt-3">
                        <table class="table table-borderless">
                            <tbody>
                                 <?php
                                    $num =1;
                                     while($row = mysqli_fetch_array($products)) { ?> 
                                <tr class="border-bottom">
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div> <img class="pic" src="images_product/<?php echo $row['images'];  ?>" alt=""> </div>
                                            <div class="ps-3 d-flex flex-column justify-content">
                                                <p class="fw-bold"><span class="ps-1"><?php echo $row['ProductName']; ?></span></p> <small class=" d-flex"> <span class=" text-muted">Color:</span> <span class=" fw-bold">Red/White</span> </small> <small class=""> <span class=" text-muted">Size:</span> <span class=" fw-bold">L</span> </small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <p class="pe-3"><span class="red">$<?php echo $row['PriceOutput'] * $_SESSION['mau'][$row['ProductID']]; ?></span></p>
                                            <p class="text-muted text-decoration-line-through">$<?php echo $price=1.5*$row['PriceOutput'] * $_SESSION['mau'][$row['ProductID']];  ?></p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center"> <span class="pe-3 text-muted">Quantity</span> <span class="pe-3"> <input name="quantity[<?php echo $row['ProductID']; ?>]" class="ps-2" type="number" value="<?php echo $_SESSION['mau'][$row['ProductID']] ?>"></span>
                                            <div class="round"> <span class=""><a href="./cart.php?action=delete&id=<?php echo $row['ProductID']; ?>"><i class="fa fa-trash" aria-hidden="true"></i></a></span> </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                                $total += $row['PriceOutput'] * $_SESSION['mau'][$row['ProductID']];
                             } ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>







        <div class="col-lg-4 payment-summary">
            <p class="fw-bold pt-lg-0 pt-4 pb-2">Payment Summary</p>
            <div class="card px-md-3 px-2 pt-4">
                <div class="unregistered mb-4"> <span class="py-1"></span> </div>
                <div class="d-flex justify-content-between pb-3"> <small class="text-muted">Transaction code</small>
                    <p class=""></p>
                </div>
                <label for="">Fullname</label>
                <div class="d-flex justify-content-between b-bottom"> 
                    <!-- <label for="">Fullname</label><br> -->
                    <input name="name" type="text" class="ps-2" placeholder="FULL NAME" value="<?php echo $_SESSION['Fullname']?>">
                    <!-- <div class="btn btn-primary">Apply</div> -->
                </div>
                <label for="">Phone number</label>
                <div class="d-flex justify-content-between b-bottom">
                    <!-- <label for="">Phone number</label><br> -->
                     <input name="phone"  type="text" class="ps-2" placeholder="PHONE NUMBER" value="<?php echo $_SESSION['user_phone']?>">
                    <!-- <div class="btn btn-primary">Apply</div> -->
                </div>
                <label for="">Address</label>
                <div class="d-flex justify-content-between b-bottom">
                     <input name="address" type="text" class="ps-2" placeholder="ADDRESS" value="<?php echo $_SESSION['Address']?>" >
                    <!-- <div class="btn btn-primary">Apply</div> -->
                </div>
              <?php
               if(!empty($products)) {   ?>
                <div class="d-flex flex-column b-bottom">
                    <div class="d-flex justify-content-between py-3"> <small class="text-muted">Order Summary</small>
                        <p>$<?php echo $total;?></p>
                    </div>
                    <div class="d-flex justify-content-between pb-3"> <small class="text-muted">Additional Service</small>
                        <p>$0</p>
                    </div>
                    <div class="d-flex justify-content-between"> <small class="text-muted">Total</small>
                        <p>$<?php echo $total;?></p>
                    </div>

                </div>
               
               <?php } ?>
               
               
                
                <div class="d-flex justify-content-between b-bottom"> <input type="text" class="ps-2" placeholder="NOTE">
                    <button type="submit" name="update_click" class="btn btn-primary" value="UPDATE">UPDATE</button><br>
                </div>
                <div class="d-flex justify-content-between b-bottom"> 
                    </div>
                   
                <div class="d-flex justify-content-between b-bottom"> 
                    <button type="submit" name="order_click" class="btn btn-primary" value="ORDER" style=" width: 100%;">ORDER</button>
                </div>
                
                <div class="sale my-3"> <span>sale<span class="px-1">expiring</span><span>in</span>:</span><span class="red">21<span class="ps-1">hours</span>,31<span class="ps-1 ">minutes</span></span> </div>
            </div>
        </div>
        
    </div>
</div>
</form>
            <?php } ?>
        </div>
   




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
</html>