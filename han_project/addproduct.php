
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/addproduct.css">
</head>
<body>


    <div class="login">
    <div class="title">Nhap thong tin san pham</div>
        <form action="./handle_addproduct.php" method="POST" enctype="multipart/form-data">
        
        <div class="group">
            <input type="text" name="productname" id="productname" placeholder="Enter productname">
        </div>
        <div class="group">
            <input type="text" name="content" id="content" placeholder="Enter content">
        </div>
        <div class="group">
            <input type="text" name="contentdetail" id="contentdetail" placeholder="Enter contentdetail">
        </div>
        <div class="group">
            <input type="text" name="priceinput" id="priceinput" placeholder="Enter priceinput">
        </div>
        <div class="group">
            <input type="text" name="priceoutput" id="priceoutput" placeholder="Enter priceoutput">
        </div>
        <div class="group">
            <input type="text" name="size" id="size" placeholder="Nhap ma size">
        </div>
        <div class="group">
            <input type="text" name="color" id="color" placeholder="Enter color">
        </div>
        <div class="group">
            <input type="number" name="status" id="status" placeholder="Enter status">
        </div>

        <div class="uploadanh">
            <label for="">Them anh san pham:....</label>
            <input type="file" name="upload_file"  id="upload_file">
        </div>
        <div class="signIn">
            <button type="submit"  name="submit">Continue</button>
        </div>
        </form>
        
    </div>
 










<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="js/signup.js"></script>
</body>
</html>